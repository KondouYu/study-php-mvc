<!-- Dodaj rozliczenie -->
<div class="modal fade" id="dodajRozliczenie">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Dodaj rozliczenie</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="addSettlementForm" action="/settlements" method="POST">

        <div class="modal-body">
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
            <label for="symbol">Kwota</label>
                <input type="text" class="form-control" id="kwota" name="kwota" pattern="[0-9]{1,}" title="Wprowadź poprawny symbol [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." required />
            </div>
            <div class="form-group">
                <label for="nazwa">Opis</label>
                <input type="text" class="form-control" id="opis" name="opis" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawny opis [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." required />
            </div>
        </div>

        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="addSettlementButton" value="Dodaj" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
        </div>

      </form>

    </div>
  </div>
</div>