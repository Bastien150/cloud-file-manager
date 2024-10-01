<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix thème révision</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2.0.6/css/pico.min.css" />
</head>

<body>
    <header class="container">
        <div class="icon">
            <a href="../../index.php">
                <svg width="46" height="46" fill="none" stroke-width="2" stroke="CurrentColor" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 9.5 12 4l9 5.5"></path>
                    <path d="M19 13v6.4a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V13"></path>
                </svg>
            </a>
        </div>
    </header>
    <main class="container">
        <section>
            <div class="menues">
                <h2>Choix Fiche de Révision :</h2>

                <div class="addbdd">
                    <form action="./flashcardmenue.php" method="post">
                        <fieldset role="group">
                            <input type="text" class="addthemebtn" placeholder="Nouveau Thème" name="addnewtheme" required>
                            <button type="submit">
                                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)" stroke="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                    <g id="SVGRepo_iconCarrier">
                                        <circle cx="12" cy="12" r="10" stroke="white" stroke-width="2.4" />
                                        <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="white" stroke-width="2.4" stroke-linecap="round" />
                                    </g>
                                </svg>
                            </button>
                        </fieldset>
                    </form>
                </div>

                <br>
                <?php
                try {
                    require_once('./model.php');
                    $conn = connecte();

                    $stmt = $conn->prepare("SHOW TABLES");

                    // Exécuter la requête
                    $stmt->execute();

                    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

                    if (count($tables) > 0) {
                        foreach ($tables as $table) {
                ?>
                            <form action="./flashcardmenue.php" method="post">
                                <input type="hidden" name="themeac" value="<?php echo $table; ?>">
                                <fieldset role="group">
                                    <button class="btname" type="submit" name="theme"><?php echo $table; ?></button>
                                    <button type="submit" name="deltheme">
                                        <svg width="35" height="35" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M14 12V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M4 7H20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </fieldset>
                            </form>
                <?php
                        }
                    } else {
                        echo "Aucune table trouvée.";
                    }
                } catch (PDOException $e) {
                    echo "Erreur: " . $e->getMessage();
                }
                $conn = null;
                ?>
            </div>
        </section>
    </main>
</body>
<script src="../../js/theme.js"></script>

</html>