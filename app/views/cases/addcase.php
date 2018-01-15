<!-- Dodaj klienta -->
<div class="modal fade" id="dodajSprawe">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Dodaj sprawę</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="addCaseForm" action="/cases" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label for="symbol">Symbol</label>
                <input type="text" class="form-control" id="symbol" name="symbol" pattern="([A-ZĄĆĘŁŃÓŚŹŻ]{1}[ a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ/-]{1,}){1,}" title="Wprowadź poprawne nazwisko korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]."  required/>
            </div>
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" class="form-control" id="nazwa" name="nazwa" pattern="([A-ZĄĆĘŁŃÓŚŹŻ]{1}[ a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ/-]{1,}){1,}" title="Wprowadź poprawne imię korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ]." required />
            </div>
            <div class="form-group">
                <label for="dziedzina">Dziedzina</label>
                <select name="dziedzina" id="dziedzina" class="form-control">
                <?php
                foreach ($dziedzinaList as $row) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nazwa'] ?></option>
                <?php
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nazwaInstytucji">Nazwa instytucji</label>
                <input type="text" class="form-control" id="nazwaInstytucji" name="nazwaInstytucji" pattern="([A-ZĄĆĘŁŃÓŚŹŻ]{1}[ a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ/-]{1,}){1,}" title="Pesel ma 11 znaków [0-9]." required />
            </div>
            <div class="form-group">
                <label for="adresInstytucji">Adres instytucji</label>
                <input type="text" class="form-control" id="adresInstytucji" name="adresInstytucji" pattern="([A-ZĄĆĘŁŃÓŚŹŻ]{1}[ a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ/-]{1,}){1,}" />
            </div>
            <div class="form-group">
                <label for="uwagi">Uwagi</label>
                <textarea name="uwagi" id="uwagi" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>

        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="addCaseButton" value="Dodaj" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
        </div>

      </form>

    </div>
  </div>
</div>