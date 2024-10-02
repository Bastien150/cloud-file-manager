let btnNewFile = document.getElementById('createNewFile');
btnNewFile.addEventListener('click', chaise);

function chaise() {
    console.log('new file');
    let bodynf = document.getElementById('nf');

    // Créer un td
    let newTd = document.createElement('td');

    //recup id parent
    let parentId = document.querySelector('[name="parent_id"]').value;

    // Créer le contenu à ajouter dans le td
    newTd.innerHTML = `
        <div class="d-flex align-items-center">
            <div class="icon-small mr-2">
                <img width="38" src="../assets/images/icon/folder.png" alt="Folder">
            </div>
            <form action="./index.php?route=create_directory" method="post" id="newFolderForm">
                <input type="text" id="inputField" name="directory_name">
                <input type="text" id="inputField" name="parent_id" value="${parentId}" hidden>
            </form>
        </div>
    `;

    // Ajouter le nouvel élément td à bodynf
    bodynf.appendChild(newTd);

    // Sélectionner le formulaire et l'input
    let form = newTd.querySelector('#newFolderForm');
    let inputField = newTd.querySelector('#inputField');

    // Ajouter l'écouteur d'événements keydown à l'input
    inputField.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); 
            form.submit();
        }
    });

    inputField.focus();
}

let dropzone = document.getElementById('dropzone');
let fileList = document.getElementById('file-list');
let toggleBtn = document.getElementById('toggle-btn');
let popup = document.getElementById('popup');
let validateBtn = document.getElementById('validate-btn');
let files = [];

toggleBtn.addEventListener('click', () => {
    popup.classList.toggle('open');
    toggleBtn.classList.toggle('open');
});

dropzone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropzone.classList.add('dragover');
});

dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('dragover');
});

dropzone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropzone.classList.remove('dragover');
    handleFiles(e.dataTransfer.files);
});

dropzone.addEventListener('click', () => {
    let input = document.createElement('input');
    input.type = 'file';
    input.multiple = true;
    input.name = 'file';
    input.onchange = e => handleFiles(e.target.files);
    input.click();
});

function handleFiles(newFiles) {
    files = [...files, ...Array.from(newFiles)];
    updateFileList();
}

function updateFileList() {
    fileList.innerHTML = '';
    files.forEach((file, index) => {
        let fileItem = document.createElement('div');
        fileItem.className = 'file-item';
        fileItem.innerHTML = `
            <div><i class="fas fa-file"></i>${file.name}</div>
            <button class="btn btn-sm btn-danger" onclick="removeFile(${index})">
                <i class="fas fa-times"></i>
            </button>
        `;
        fileList.appendChild(fileItem);
    });
    validateBtn.disabled = files.length === 0;
}

function removeFile(index) {
    files.splice(index, 1);
    updateFileList();
}

validateBtn.addEventListener('click', (e) => {
    e.preventDefault();
    uploadFiles();
});

function uploadFiles() {
    if (files.length === 0) return;

    const file = files.shift(); // Prend le premier fichier de la liste
    let formData = new FormData(document.getElementById('upload-form'));
    formData.append('file', file);

    fetch('index.php?route=upload', {
        method: 'POST',
        body: formData
    }).then(response => {
        if (!response.ok) {
            throw new Error('Erreur réseau');
        }
        return response.text();
    }).then(() => {
        console.log('Fichier uploadé:', file.name);
        updateFileList();
        if (files.length > 0) {
            uploadFiles(); // Upload le fichier suivant s'il y en a
        } else {
            location.reload();
        }
    }).catch(error => {
        console.error('Erreur:', error);
        alert(`Erreur lors de l'upload de ${file.name}`);
    });
}