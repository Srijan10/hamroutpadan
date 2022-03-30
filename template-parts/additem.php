<?php

/* Template Name: additem */
?>

<div class="container" id="addItem_showcase">
    <div class="AddItem-form">
          <div class="text">
                Item Form
          </div>
          <form id="form" method="post" enctype="multipart/form-data">
             <div class="field" >   
             <label for="category" style="flex:50%;">Category</label>
                    <select name="category" id="category" >
                  
              <option value="" selected></option>
          
              <option value="" ></option>
             
                </select><br>
                </div>   
                <div class="field">
                     <input type="text" id="name" name="name"  value="" placeholder="Item Name"autocomplete="off">
                </div> 
                <div class="field">
                <label for="description"style="flex:50%;">Price:</label>    
                    <input type="number" id="price" name="price"style="flex:50%;" placeholder="Price" value="" min="0">
                </div>
                <div class="field">
                <label for="description"style="flex:50%;">Quantity:</label>    
                    <input type="number" id="quanity" name="quantity"style="flex:50%;" placeholder="Quantity" value="" min="1">
                </div>        
                <div class="field">
                    <input type="file" id="image" name="image"
                     accept="image/png, image/jpeg, image/jpg"  >
                </div>   
                <div class="description">
                <label for="description">Description:</label>                
                    <textarea id="description" name="description"  value="" rows="5" cols="55" autocomplete="off"  >                
                </textarea> <br>
                </div>
    
                <div class="available">
                <label for="status">Availability: </label><br> 
                    <input type="radio" id="Active" name="status" value="1"  >
                    <label for="Active" >Availbale</label><br>
                    <input type="radio" id="Deactive" name="status" value="0" >
                    <label for="Deactive">Not-Available</label><br>
                </div>
                <div class="buttons"> 
                    <input type="submit" id="submit" name="btn_submit" value="Submit">
               </div>
                <div class="buttons">    
                    <input type="reset" id="clear" name="btnclear" value="Clear" >
                </div>
                </div>
                
             </form>
          </div>
      
        
    </div>


    <?php