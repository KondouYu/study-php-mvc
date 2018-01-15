<!-- Dodaj klienta -->
<div class="modal fade" id="dodajKlienta">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Dodaj klienta</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="addCustomerForm" action="/customers" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label for="symbol">Symbol</label>
                <input type="text" class="form-control" id="symbol" name="symbol" pattern="[ 0-9a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ///._/-]{1,}" title="Wprowadź poprawne nazwisko korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][0-9][- _ .][space]."  required/>
            </div>
            <div class="form-group">
                <label for="imie">Imię</label>
                <input type="text" class="form-control" id="imie" name="imie" pattern="[A-ZĄĆĘŁŃÓŚŹŻ]{1}[a-ząćęłńóśźż]{1,}" title="Wprowadź poprawne imię korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ]." required />
            </div>
            <div class="form-group">
                <label for="nazwisko">Nazwisko</label>
                <input type="text" class="form-control" id="nazwisko" name="nazwisko" pattern="([A-ZĄĆĘŁŃÓŚŹŻ]{1}[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ/-]{1,}){1,}" title="Wprowadź poprawne nazwisko korzystając ze znaków [a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ][-]." required />
            </div>
            <div class="form-group">
                <label for="pesel">Pesel</label>
                <input type="text" class="form-control" id="pesel" name="pesel" pattern="[0-9]{11}" title="Pesel ma 11 znaków [0-9]." required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" title="Wprowadź poprawny adres email: przykład jan.kowalski@kancelaria.pl" />
            </div>
            <div class="form-group">
                <label for="nrUmowy">Nr umowy</label>
                <input type="text" class="form-control" id="nrUmowy" name="nrUmowy" placeholder="XXXX/MM/YYYY" pattern="[0-9]{4}/[0-1][0-9]/[0-9]{4}" title="Wprowadź wartość w poprawnym formacie XXXX/MM/YYYY" required />
            </div>
        </div>

        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="addCustomerButton" value="Dodaj" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
        </div>

      </form>

    </div>
  </div>
</div>