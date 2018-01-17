<!-- Dodaj czynność -->
<div class="modal fade" id="dodajCzynnosc">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Dodaj czynność</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="addCaseForm" action="/actions" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label for="koszt">Koszt</label>
                <input type="text" class="form-control" id="koszt" name="koszt" pattern="[0-9]{1,}" title="Wprowadź poprawną kwotę używając cyfr [0-9]."  required/>
            </div>
            <div class="form-group">
                <label for="sprawa">Sprawa</label>
                <select name="sprawa" id="sprawa" class="form-control">
                <?php
                foreach ($caseData as $row) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= '[' . $row['symbol'] . '] ' . $row['nazwa'] ?></option>
                <?php
                }
                ?>
                </select>
            </div>
            <div class="form-group">
            <label for="symbol">Symbol</label>
                <input type="text" class="form-control" id="symbol" name="symbol" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawny symbol [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." required />
            </div>
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" class="form-control" id="nazwa" name="nazwa" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawną nazwę instytucji korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." required />
            </div>
            <div class="form-group">
                <label for="miejsce">Miejsce</label>
                <input type="text" class="form-control" id="miejsce" name="miejsce" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawne miejsce [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." />
            </div>
            <div class="form-group">
                <label for="typCzynnosci">Typ czynności</label>
                <select name="typCzynnosci" id="typCzynnosci" class="form-control">
                <?php
                foreach ($typCzynnosciList as $row) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nazwa'] ?></option>
                <?php
                }
                ?>
                </select>    
            </div>
            <div class="form-group">
                <label for="podtypCzynnosci">Podtyp czynności</label>
                <select name="podtypCzynnosci" id="podtypCzynnosci" class="form-control">
                <?php
                foreach ($podtypCzynnosciList as $row) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nazwa'] ?></option>
                <?php
                }
                ?>
                </select>    
            </div>
            <div class="form-group">
                <label for="dataRozpoczecia">Data rozpoczęcia</label>
                <input type="datetime-local" class="form-control" id="dataRozpoczecia" name="dataRozpoczecia" />
            </div>
            <div class="form-group">
                <label for="dataZakonczenia">Data zakończenia</label>
                <input type="datetime-local" class="form-control" id="dataZakonczenia" name="dataZakonczenia" />
            </div>
            <div class="form-group">
                <label for="opis">Opis</label>
                <textarea name="opis" id="opis" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>

        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="addActionButton" value="Dodaj" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
        </div>

      </form>

    </div>
  </div>
</div>