<div class="container-fluid">
    <h1>Demande de réadhésion à l'association</h1>

    <h2>Comment réadhérer à l'association ?</h2>
    Pour réadhérer à l'association, veuillez tout d'abord spécifier votre moyen de paiement ainsi que le tarif qui vous est appliqué :

    <form method="post" action="readherer.php">
        <div class="form-group">
            <select tabindex="16" class="selectpicker form-control input-lg" required="required" id="payment" name="payment">
                <option disabled selected>Moyen de paiement</option>
                <option value="1">Chèque</option>
                <option value="2">Virement bancaire</option>
                <option value="3">Carte bancaire via helloasso</option>
            </select>
        </div>
        <div class="form-group">
            <select tabindex="17" class="selectpicker form-control input-lg" required="required" id="valuePaid" name="valuePaid">
                <option disabled selected>Montant de la cotisation</option>
                <option value="60">Libéral : 60€</option>
                <option value="40">Salarié : 40€</option>
                <option value="100">Membre bienfaiteur : 100€ et +</option>
            </select>
        </div>
        <hr class="colorgraph">
        <button id="submit" type="submit" style="margin: auto; width: 250px; "
                class="btn btn-primary btn-block btn-lg">
            <i class="glyphicon glyphicon-ok-sign"></i> Réadhérer à l'association
        </button>
    </form>
    </div>

