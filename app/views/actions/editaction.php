<!-- Edytuj czynność -->
<div class="modal fade" id="edytujCzynnosc">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Edytuj czynność</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="editCaseForm" action="/actions/read/<?= $actionData['id'] ?>" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label for="koszt">Koszt</label>
                <input type="text" class="form-control" id="koszt" name="koszt" value="<?= $actionData['koszt'] ?>" pattern="[0-9]{1,}" title="Wprowadź poprawną kwotę używając cyfr [0-9]."  required/>
            </div>
            <div class="form-group">
                <label for="sprawa">Sprawa</label>
                <select name="sprawa" id="sprawa" class="form-control">
                <?php
                foreach ($caseData as $row) {
                    if ($row['id'] == $actionData['sprawaID']) {
                ?>
                    <option value="<?= $row['id'] ?>" selected><?= '[' .$row['symbol']. '] ' . $row['nazwa'] ?></option>
                <?php
                    } else {
                ?>
                    <option value="<?= $row['id'] ?>"><?= '[' .$row['symbol']. '] ' . $row['nazwa'] ?></option>
                <?php
                    }
                }
                ?>
                </select>
            </div>
            <div class="form-group">
            <label for="symbol">Symbol</label>
                <input type="text" class="form-control" id="symbol" name="symbol" value="<?= $actionData['symbol'] ?>" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawny symbol [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." required />
            </div>
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="<?= $actionData['nazwa'] ?>" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawną nazwę instytucji korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." required />
            </div>
            <div class="form-group">
                <label for="miejsce">Miejsce</label>
                <input type="text" class="form-control" id="miejsce" name="miejsce" value="<?= $actionData['miejsce'] ?>" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawne miejsce [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." />
            </div>
            <div class="form-group">
                <label for="typCzynnosci">Typ czynności</label>
                <select name="typCzynnosci" id="typCzynnosci" class="form-control">
                <?php
                foreach ($typCzynnosciList as $row) {
                    if ($row['id'] == $actionData['typCzynnosci']) {
                ?>
                    <option value="<?= $row['id'] ?>" selected><?= $row['nazwa'] ?></option>
                <?php
                    } else {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nazwa'] ?></option>
                <?php
                    }
                }
                ?>
                </select>    
            </div>
            <div class="form-group">
                <label for="podtypCzynnosci">Podtyp czynności</label>
                <select name="podtypCzynnosci" id="podtypCzynnosci" class="form-control">
                <?php
                foreach ($podtypCzynnosciList as $row) {
                    if ($row['id'] == $actionData['podtypCzynnosci']) {
                ?>
                    <option value="<?= $row['id'] ?>" selected><?= $row['nazwa'] ?></option>
                <?php
                    } else {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nazwa'] ?></option>
                <?php
                    }
                }
                ?>
                </select>    
            </div>
            <div class="form-group">
                <label for="dataRozpoczecia">Data rozpoczęcia</label>
                <input type="datetime-local" class="form-control" id="dataRozpoczecia" name="dataRozpoczecia" value="<?= str_replace(' ', 'T', $actionData['dataRozpoczecia']) ?>" />
            </div>
            <div class="form-group">
                <label for="dataZakonczenia">Data zakończenia</label>
                <input type="datetime-local" class="form-control" id="dataZakonczenia" name="dataZakonczenia" value="<?= str_replace(' ', 'T', $actionData['dataZakonczenia']) ?>" />
            </div>
            <div class="form-group">
                <label for="opis">Opis</label>
                <textarea name="opis" id="opis" cols="30" rows="10" class="form-control"><?= $actionData['opis'] ?></textarea>
            </div>
        </div>

        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="editActionButton" value="Dodaj" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
        </div>

      </form>

    </div>
  </div>
</div>