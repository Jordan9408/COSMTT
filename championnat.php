<?php include('./html_partials/header.php') ?>
<main>
  <div id="align-center">
    <p><img src="./img/logo-ufolep.jpg" alt="Logo_Ufolep" class="ufolep"></p>
    <h2 class="h2_championnat">CHAMPIONNAT</h2>
    <!-- Tableau Classement -->
    <table id="classement">
      <tbody>
        <tr class="tabtitre">
          <th colspan="6">CLASSEMENT</th>
        </tr>
        <tr class="tabtitre">
          <th>Nom équipe</th>
          <th>Points</th>
          <th>Journées</th>
          <th>Victoires</th>
          <th>Défaites</th>
          <th>Nul</th>
        </tr>

        <tr class="tabcouleur1">
          <td class="club"><?php echo ("Ménestreau 1") ?></td>
          <td><?php echo ("45") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("14") ?></td>
          <td><?php echo ("1") ?></td>
          <td><?php echo ("1") ?></td>
        </tr>

        <tr class="tabcouleur2">
          <td class="club"><?php echo ("Messas") ?></td>
          <td><?php echo ("43") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("12") ?></td>
          <td><?php echo ("1") ?></td>
          <td><?php echo ("3") ?></td>
        </tr>
        <tr class="tabcouleur1">
          <td class="club"><?php echo ("Charsonville 1") ?></td>
          <td><?php echo ("41") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("12") ?></td>
          <td><?php echo ("3") ?></td>
          <td><?php echo ("1") ?></td>
        </tr>

        <tr class="tabcouleur2">
          <td class="club"><?php echo ("Ménestreau 2") ?></td>
          <td><?php echo ("35") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("9") ?></td>
          <td><?php echo ("6") ?></td>
          <td><?php echo ("1") ?></td>
        </tr>

        <tr class="tabcouleur1">
          <td class="club"><?php echo ("Bouzy") ?></td>
          <td><?php echo ("32") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("7") ?></td>
          <td><?php echo ("7") ?></td>
          <td><?php echo ("2") ?></td>
        </tr>

        <tr class="tabcouleur2">
          <td class="club"><?php echo ("Marcilly") ?></td>
          <td><?php echo ("27") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("5") ?></td>
          <td><?php echo ("10") ?></td>
          <td><?php echo ("1") ?></td>
        </tr>

        <tr class="tabcouleur1">
          <td class="club"><?php echo ("Ménestreau 3") ?></td>
          <td><?php echo ("25") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("4") ?></td>
          <td><?php echo ("11") ?></td>
          <td><?php echo ("1") ?></td>
        </tr>

        <tr class="tabcouleur2">
          <td class="club"><?php echo ("Charsonville 2") ?></td>
          <td><?php echo ("24") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("3") ?></td>
          <td><?php echo ("11") ?></td>
          <td><?php echo ("2") ?></td>
        </tr>

        <tr class="tabcouleur1">
          <td class="club"><?php echo ("Binas") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("0") ?></td>
          <td><?php echo ("16") ?></td>
          <td><?php echo ("0") ?></td>
        </tr>
      </tbody>
    </table>
    <!--Fin tableau classement-->
    <h2 class="h2_championnat">CALENDRIER</h2>
    <div id="rencontres_championnat">
      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 1 (10/10 au 16/10)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Charsonville 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Binas</td>
          </tr>
          <tr>
            <td>Bouzy</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 2</td>
          </tr>
          <tr>
            <td>Ménestreau 3</td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="exempter_match"></td>
          </tr>
          <tr>
            <td>Marcilly</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Charsonville 2</td>
          </tr>
          <tr>
            <td>Messas</td>
            <td class="points"><?php echo ("2") ?></td>
            <td class="points"><?php echo ("2") ?></td>
            <td>Ménestreau 1</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 2 (17/10 au 23/10)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Binas</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 1</td>
          </tr>
          <tr>
            <td>Ménestreau 2</td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="exempter_match"></td>
          </tr>
          <tr>
            <td>Charsonville 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 3</td>
          </tr>
          <tr>
            <td>Charsonville 2</td>
            <td class="points"><?php echo ("2") ?></td>
            <td class="points"><?php echo ("2") ?></td>
            <td>Bouzy</td>
          </tr>
          <tr>
            <td>Messas</td>
            <td class="points"><?php echo ("2") ?></td>
            <td class="points"><?php echo ("2") ?></td>
            <td>Marcilly</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 3 (24/10 au 30/10)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="exempter_match"></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td>Charsonville 2</td>
          </tr>
          <tr>
            <td>Ménestreau 3</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 1</td>
          </tr>
          <tr>
            <td>Binas</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Marcilly</td>
          </tr>
          <tr>
            <td>Bouzy</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Charsonville 1</td>
          </tr>
          <tr>
            <td>Ménestreau 2</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Messas</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 4 (17/10 au 23/10)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="exempter_match"></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td>Binas</td>
          </tr>
          <tr>
            <td>Charsonville 2</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Messas</td>
          </tr>
          <tr>
            <td>Marcilly</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Charsonville 1</td>
          </tr>
          <tr>
            <td>Bouzy</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 3</td>
          </tr>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 2</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 5 (28/10 au 04/12)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Marcilly</td>
          </tr>
          <tr>
            <td>Binas</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Charsonville 2</td>
          </tr>
          <tr>
            <td>Charsonville 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 2</td>
          </tr>
          <tr>
            <td>Messas</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 3</td>
          </tr>
          <tr>
            <td class="exempter_match"></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td>Bouzy</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 6 (12/12 au 18/12)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Bouzy</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 1</td>
          </tr>
          <tr>
            <td>Ménestreau 2</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Charsonville 2</td>
          </tr>
          <tr>
            <td>Messas</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Binas</td>
          </tr>
          <tr>
            <td>Ménestreau 3</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Marcilly</td>
          </tr>
          <tr>
            <td>Charsonville 1</td>
            <td class="points exempter_match"></td>
            <td class="points exempter_match"></td>
            <td class="exempter_match"></td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 7 (19/12 au 01/01)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Charsonville 1</td>
          </tr>
          <tr>
            <td>Charsonville 2</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 3</td>
          </tr>
          <tr>
            <td class="exempter_match"></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td>Messas</td>
          </tr>
          <tr>
            <td>Binas</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 2</td>
          </tr>
          <tr>
            <td>Marcilly</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Bouzy</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 8 (02/01 au 08/01)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Charsonville 2</td>
          </tr>
          <tr>
            <td>Charsonville 1</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Messas</td>
          </tr>
          <tr>
            <td>Bouzy</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Binas</td>
          </tr>
          <tr>
            <td>Ménestreau 3</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 2</td>
          </tr>
          <tr>
            <td>Marcilly</td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="exempter_match"></td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 9 (09/01 au 15/01)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Charsonville 2</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Charsonville 1</td>
          </tr>
          <tr>
            <td>Messas</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Bouzy</td>
          </tr>
          <tr>
            <td>Binas</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 3</td>
          </tr>
          <tr>
            <td>Ménestreau 2</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Marcilly</td>
          </tr>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="exempter_match"></td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 10 (23/01 au 29/01)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Binas</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Charsonville 1</td>
          </tr>
          <tr>
            <td>Ménestreau 2</td>
            <td class="points"><?php echo ("2") ?></td>
            <td class="points"><?php echo ("2") ?></td>
            <td>Bouzy</td>
          </tr>
          <tr>
            <td class="exempter_match"></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td>Ménestreau 3</td>
          </tr>
          <tr>
            <td>Charsonville 2</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Marcilly</td>
          </tr>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Messas</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 11 (06/02 au 12/02)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Binas</td>
          </tr>
          <tr>
            <td class="exempter_match"></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td>Ménestreau 2</td>
          </tr>
          <tr>
            <td>Ménestreau 3</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Charsonville 1</td>
          </tr>
          <tr>
            <td>Bouzy</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Charsonville 2</td>
          </tr>
          <tr>
            <td>Marcilly</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Messas</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 12 (13/02 au 26/02)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Charsonville 2</td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="exempter_match"></td>
          </tr>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 3</td>
          </tr>
          <tr>
            <td>Marcilly</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Binas</td>
          </tr>
          <tr>
            <td>Charsonville 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Bouzy</td>
          </tr>
          <tr>
            <td>Messas</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 2</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 13 (06/03 au 12/03)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Binas</td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="exempter_match"></td>
          </tr>
          <tr>
            <td>Messas</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Charsonville 2</td>
          </tr>
          <tr>
            <td>Charsonville 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Marcilly</td>
          </tr>
          <tr>
            <td>Ménestreau 3</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Bouzy</td>
          </tr>
          <tr>
            <td>Ménestreau 2</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 1</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 14 (20/03 au 26/03)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Marcilly</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 1</td>
          </tr>
          <tr>
            <td>Charsonville 2</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Binas</td>
          </tr>
          <tr>
            <td>Ménestreau 2</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Charsonville 1</td>
          </tr>
          <tr>
            <td>Ménestreau 3</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Messas</td>
          </tr>
          <tr>
            <td>Bouzy</td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="exempter_match"></td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 15 (03/04 au 09/04)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Bouzy</td>
          </tr>
          <tr>
            <td>Charsonville 2</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 2</td>
          </tr>
          <tr>
            <td>Binas</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Messas</td>
          </tr>
          <tr>
            <td>Marcilly</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 3</td>
          </tr>
          <tr>
            <td class="exempter_match"></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td>Charsonville 1</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 16 (10/04 au 16/04)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Charsonville 1</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 1</td>
          </tr>
          <tr>
            <td>Ménestreau 3</td>
            <td class="points"><?php echo ("2") ?></td>
            <td class="points"><?php echo ("2") ?></td>
            <td>Charsonville 2</td>
          </tr>
          <tr>
            <td>Messas</td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="exempter_match"></td>
          </tr>
          <tr>
            <td>Ménestreau 2</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Binas</td>
          </tr>
          <tr>
            <td>Bouzy</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Marcilly</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 17 (17/04 au 23/04)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Charsonville 2</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 1</td>
          </tr>
          <tr>
            <td>Messas</td>
            <td class="points"><?php echo ("2") ?></td>
            <td class="points"><?php echo ("2") ?></td>
            <td>Charsonville 1</td>
          </tr>
          <tr>
            <td>Binas</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Bouzy</td>
          </tr>
          <tr>
            <td>Ménestreau 2</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Ménestreau 3</td>
          </tr>
          <tr>
            <td class="exempter_match"></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td>Marcilly</td>
          </tr>
        </tbody>
      </table>

      <table class="journees_championnat">
        <thead>
          <tr>
            <th colspan="4">Journée 18 (24/04 au 30/04)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Charsonville 1</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Charsonville 2</td>
          </tr>
          <tr>
            <td>Bouzy</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Messas</td>
          </tr>
          <tr>
            <td>Ménestreau 3</td>
            <td class="points"><?php echo ("3") ?></td>
            <td class="points"><?php echo ("1") ?></td>
            <td>Binas</td>
          </tr>
          <tr>
            <td>Marcilly</td>
            <td class="points"><?php echo ("1") ?></td>
            <td class="points"><?php echo ("3") ?></td>
            <td>Ménestreau 2</td>
          </tr>
          <tr>
            <td>Ménestreau 1</td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="points exempter_match"><?php echo ("") ?></td>
            <td class="exempter_match"></td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
</main>
<script src="./js/app.js"></script>
<?php include('./html_partials/footer.php') ?>