<!DOCTYPE html>
<html>
  <head>
    <title>Google Calendar API Quickstart</title>
    <meta charset="utf-8" />
  </head>
  <body>
    <p>Google Calendar API Quickstart</p>

    <!--Ajouter des boutons pour initier la séquence d'authentification et se déconnecter-->
    <button id="authorize_button" onclick="handleAuthClick()">Autoriser</button>
    <button id="signout_button" onclick="handleSignoutClick()">Se déconnecter</button>

    <pre id="content" style="white-space: pre-wrap;"></pre>

    <script type="text/javascript">
        checkAuth()
      /**
       * Vérifie si l'utilisateur est déjà connecté et lance la séquence d'authentification si nécessaire.
       */
      function checkAuth() {
        if (gapi.client.getToken() === null) {
          // L'utilisateur n'est pas connecté, lancer la séquence d'authentification
          handleAuthClick();
        } else {
          // L'utilisateur est déjà connecté, afficher les événements
          listUpcomingEvents();
        }
      }

      /**
       * Active l'interaction utilisateur après le chargement de toutes les bibliothèques.
       */
      function maybeEnableButtons() {
        if (gapiInited && gisInited) {
          document.getElementById('authorize_button').style.visibility = 'visible';
          checkAuth(); // Appeler la fonction checkAuth()
        }
      }

      /* exported gapiLoaded */
      /* exported gisLoaded */
      /* exported handleAuthClick */
      /* exported handleSignoutClick */

      // TODO(développeur) : Définir l'ID client et la clé API depuis la console de développement
      const CLIENT_ID = '59687325787-biq98uhgrmgvb512nk1jsfjcjqs7nem6.apps.googleusercontent.com';
      const API_KEY = 'AIzaSyC93oZKdngAeuyVoWR8jiuEKdJYaHEopQg';

      // URL du document de découverte pour les API utilisées par le quickstart
      const DISCOVERY_DOC = 'https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest';

      // Étendues d'autorisation requises par l'API ; plusieurs étendues peuvent être
      // incluses, séparées par des espaces.
      const SCOPES = 'https://www.googleapis.com/auth/calendar.readonly';

      let tokenClient;
      let gapiInited = false;
      let gisInited = false;

      document.getElementById('authorize_button').style.visibility = 'hidden';
      document.getElementById('signout_button').style.visibility = 'hidden';

      /**
       * Callback après le chargement de api.js.
       */
      function gapiLoaded() {
        gapi.load('client', initializeGapiClient);
      }

      /**
       * Callback après le chargement du client API. Charge le
       * document de découverte pour initialiser l'API.
       */
      async function initializeGapiClient() {
        await gapi.client.init({
          apiKey: API_KEY,
          discoveryDocs: [DISCOVERY_DOC],
        });
        gapiInited = true;
        maybeEnableButtons();
      }

      /**
       * Callback après le chargement des services d'identité Google.
       */
      function gisLoaded() {
        tokenClient = google.accounts.oauth2.initTokenClient({
          client_id: CLIENT_ID,
          scope: SCOPES,
          callback: '', // défini plus tard
        });
        gisInited = true;
        maybeEnableButtons();
      }

      /**
       *  Connecte l'utilisateur lors du clic sur le bouton.
       */
      function handleAuthClick() {
        tokenClient.callback = async (resp) => {
          if (resp.error !== undefined) {
            throw resp;
          }
          document.getElementById('signout_button').style.visibility = 'visible';
          document.getElementById('authorize_button').innerText = 'Actualiser';
          await listUpcomingEvents();
        };

        if (gapi.client.getToken() === null) {
          // Invite l'utilisateur à sélectionner un compte Google et à donner son consentement pour partager ses données
          // lors de l'établissement d'une nouvelle session.
          tokenClient.requestAccessToken({prompt: 'consent'});
        } else {
          // Ignore l'affichage du sélecteur de compte et de la boîte de dialogue de consentement pour une session existante.
          tokenClient.requestAccessToken({prompt: ''});
        }
      }

      /**
       *  Déconnecte l'utilisateur lors du clic sur le bouton.
       */
      function handleSignoutClick() {
        const token = gapi.client.getToken();
        if (token !== null) {
          google.accounts.oauth2.revoke(token.access_token);
          gapi.client.setToken('');
          document.getElementById('content').innerText = '';
          document.getElementById('authorize_button').innerText = 'Autoriser';
          document.getElementById('signout_button').style.visibility = 'hidden';
        }
      }

      /**
       * Affiche le résumé et la date/heure de début des dix prochains événements dans
       * le calendrier de l'utilisateur autorisé. Si aucun événement n'est trouvé, un
       * message approprié est affiché.
       */
      async function listUpcomingEvents() {
        let response;
        try {
          const request = {
            'calendarId': 'primary',
            'timeMin': (new Date()).toISOString(),
            'showDeleted': false,
            'singleEvents': true,
            'maxResults': 10,
            'orderBy': 'startTime',
          };
          response = await gapi.client.calendar.events.list(request);
        } catch (err) {
          document.getElementById('content').innerText = err.message;
          return;
        }

        const events = response.result.items;
        if (!events || events.length === 0) {
          document.getElementById('content').innerText = 'Aucun événement trouvé.';
          return;
        }
        // Aplatir en chaîne de caractères pour l'affichage
        const output = events.reduce(
            (str, event) => `${str}${event.summary} (${event.start.dateTime || event.start.date})\n`,
            'Événements:\n');
        document.getElementById('content').innerText = output;
      }
    </script>
    <script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
    <script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>
  </body>
</html>