<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding-right: 400px;
  padding-left: 400px;
}

* {
  box-sizing: border-box;
}
h2{
  text-align: center;
}
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 10px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 15px;
  font-size: 24px;
}

.btn {
  background-color:#44514d;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color:rgba(154, 154, 154, 0.64);
}

a {
  color: rgba(154, 154, 154, 0.80);
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Payment</h2>
  <div class="col-70">
    <div class="container">
      <form action="Payment.php">


          <div class="col-50">
            <label for="fname"><h4>Accepted Cards</h4></label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Cardholder Name</label>
            <input type="text" id="name" placeholder="Enter Card Name ">
            <label for="ccnum">Credit card number</label>
            <input type="text"  id="number" placeholder="Enter Card Number">
            <label for="expmonth">Exp Date</label>
            <input type="text" id="date"  placeholder="MMYY">

                <label for="cvv">CVV</label>
                <input type="text" id="cvv" placeholder="000">


          </div>
          </label>
          <button class="btn" type="submit" name="btn">Submit</button>
        </div>

      </form>
    </div>
  </div>

</div>

</body>
</html>
