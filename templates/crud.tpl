<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $marche
 * @var $colori
 * @var $all

 */
?>

<?php $this->layout('home', ['titolo' => 'Esempio CRUD']) ?>

<h1>Cose da fare</h1>

<form method="post" action="index.php">
    <input type="text" name="targa" placeholder="targa">
    <select name="marca">
        <option value=""> SELEZIONA MARCA  </option>
        <?php foreach($marche as $marca): ?>
            <option><?= $marca['marca'] ?> </option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="modello" placeholder="modello">
    <select name="colore">
        <option value=""> SELEZIONA COLORE </option>
        <?php foreach($colori as $colore): ?>
            <option><?= $colore['colore'] ?> </option>
        <?php endforeach; ?>
    </select>
    <input type="submit">
</form>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Da fare</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($all as $one):?>
        <tr>
            <td>
                <?= $one['targa']?>
            </td>
            <td>
                <?= $one['marca']?>
            </td>
            <td>
                <?= $one['modello']?>
            </td>
            <td>
                <?= $one['colore']?>
            </td>
            <td>
                <?= $one['nome_proprietario']?>
            </td>
            <td>
                <?= $one['cognome_proprietario']?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>