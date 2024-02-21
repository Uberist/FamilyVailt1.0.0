<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require('navbar.php');
    ?>
    <div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4 logo" src="img/logo.png" alt="" width="72" height="57">
      <h2>Add Media</h2>
      <p class="lead"></p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$12</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Third item</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate="">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="choseEvent" class="form-label">Выберите событие</label>
              <select class="form-select" id="choseEvent" required="">
              <?php 
                    include('DBConnection.php');
                    $queryFamilyID = '
                    select familymembers.familyID 
                    from familyMembers 
                    join users on users.memberID = familyMembers.memberID 
                    where login = "'.$_COOKIE['login'].'";';
                    $familyID = mysqli_fetch_assoc(mysqli_query($connection->getConnection(), $queryFamilyID))['familyID'];
                    $query="
                    select eventID, name 
                    from events 
                    where familyID = '".$familyID."';";
                    $EventName;
                    $EventID;
                    $result = mysqli_query($connection->getConnection(), $query);
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)){
                        $EventName = $row["name"];
                        $EventID = $row["eventID"];
                        echo '<option value="'.$EventID.'">'.$EventName.'</option>';
                        $i++;
                        }
                ?>
              </select>
            </div>
            <div class="col-sm-6">
              <label for="lastName" class="form-label">Или создайте новое</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
          <h4 class="mb-3">Кто на фото</h4>
          <?php 
                $queryFamilyID = '
                select familymembers.familyID 
                from familyMembers 
                join users on users.memberID = familyMembers.memberID 
                where login = "'.$_COOKIE['login'].'";';
                $familyID = mysqli_fetch_assoc(mysqli_query($connection->getConnection(), $queryFamilyID))['familyID'];
                $query = '
                select memberID, firstName, lastName, fatherName
                from familyMembers 
                where familyID = '.$familyID.';';
                $MemberName = '';
                $MemberID;
                $result = mysqli_query($connection->getConnection(), $query);
                $row;
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $MemberName = $row['firstName'].' '.$row['lastName'].' '.$row['fatherName'];
                    $memberID = $row['memberID'];
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="checkbox" value="'.$memberID.'" id="same-address" name="numberPerson:'.(string)$i.'">';
                    echo '<label class="form-check-label" for="same-address"></label>';
                    echo $MemberName;
                    echo '</label>';
                    echo '</div>';
                    $i++;
                }
                ?>
          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <select class="form-select" id="choseEvent" required="">
            
              </select>
              
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required="">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-body-secondary text-center text-small">
    <p class="mb-1">© 2017–2023 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
</body>
</html>