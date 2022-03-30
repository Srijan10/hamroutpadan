<div class="mainbody">
  
  <div class="merchantHeader">
      Merchant : UserName
  </div>
  <div class="container" id = "merchantbody_container">
      <div class="merchantbody">
          <div class="merchantbox" id="account" onclick="displayShowcase('account')">
              <div class="icons">
                  <i class="fa fa-address-card" aria-hidden="true"></i>
              </div>
              <div class="account">Account</div>
          </div>
          <div class="merchantbox" id="addItems" onclick="displayShowcase('additem')">
              <div class="icons">
                  <i class="fa fa-user" aria-hidden="true"></i>
              </div>
              <div class="additems">Add Items</div>
          </div>
      </div>
      <div class="merchantbody">
          <div class="merchantbox" id="your_product" onclick="displayShowcase('your_product')">
              <div class="icons">
                  <i class="fa fa-user" aria-hidden="true"></i>
              </div>
              <div class="yourProduct">Your product</div>
          </div>
          <div class="merchantbox" id="setting" onclick="displayShowcase('setting')">
              <div class="icons">
                  <i class="fa fa-gears" aria-hidden="true"></i>
              </div>
              <div class="settings">Setting</div>
          </div>
      </div>
  </div>
</div>
<div class="back">
  <button id="show_hidden_merchantContainer" style="display: none;" onclick="displayShowcaseContainer()">
      Back
  </button>
</div>

<div class="merchant_showcase" id="merchant_showcase">

</div>