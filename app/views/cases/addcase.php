<!-- Dodaj sprawę -->
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
                <input type="text" class="form-control" id="symbol" name="symbol" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawny symbol korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]."  required/>
            </div>
            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" class="form-control" id="nazwa" name="nazwa" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawną nazwę sprawy korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." required />
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
                <input type="text" class="form-control" id="nazwaInstytucji" name="nazwaInstytucji" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawną nazwę instytucji korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." required />
            </div>
            <div class="form-group">
                <label for="adresInstytucji">Adres instytucji</label>
                <input type="text" class="form-control" id="adresInstytucji" name="adresInstytucji" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawny adres instytucji korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]." />
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