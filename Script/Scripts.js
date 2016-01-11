$(document).ready(function() {
            $("#Login").click(function() {
                    var h = $(document).height() + 'px';
                    $("#black_overlay").css({"height":h,"visibility":"visible"});
                    $(".added").css('display','block');
            });
            $(".close, #submit").click(function() {
                $(".added").css('display','none');
                $("#black_overlay").css("visibility","hidden");
            });
            
        });
 $(function(){
        $('.barOrderList').tabSlideOut({
            tabHandle: '.handle',                    
            pathToTabImage: 'Resources/leftArrow.png',
            imageHeight: '120px',                 
            imageWidth: '90px',                   
            tabLocation: 'right',                
            speed: 200,                         
            action: 'click',                    
            topPos: '80px',                    
            leftPos: '33.3%',                    
            fixedPosition: true                
        });

    });

function deleteRow(row)
        {
             var i = row.parentNode.parentNode.rowIndex;
            document.getElementById('orderList').deleteRow(i);
            updateIndecies();
            updateTotal();
        }
function updateIndecies()
        {
            var m =1 ;
            var table = document.getElementById('orderList');
            var len = table.rows.length;
            document.getElementById('itemsNumber').setAttribute('value',len);
           for (var i = 0, row; row = table.rows[i]; i++) 
            {
                cell = row.cells[0];
                row.cells[1].setAttribute("name","Price"+m);
                row.cells[2].setAttribute("name","Size"+m);
                row.cells[3].setAttribute("name","Color"+m);
                cell.innerHTML = m++;
            }
        }
function addRow(item)
        {
            m = 3;
            var x = item.parentNode.parentNode;
            var itemId = x.getAttribute("value");
            var firstRow = x.getElementsByTagName('table')[0];
            
            var row = firstRow .rows[0];
            
                cell = row.getElementsByClassName("price")[0];
            var cell0 = cell.innerText;
            
                cell = row.cells[1].children[0];
            console.info(cell.selectedIndex);
            if(cell.selectedIndex == 0)
            {
                alert("Please select size and color before adding the item");
                return;
            }
            
             var cell1 = cell.options[cell.selectedIndex].text;
            var cell1Value= cell.value;
            
                cell = row.cells[2].children[0];
            if(cell.selectedIndex == 0)
            {
                alert("Please select size and color before adding the item");
                return;
            }
            
             var cell2 = cell.options[cell.selectedIndex].text;
            var cell2Value= cell.value;
            
            var table = document.getElementById('orderList');
            var newRow = table.insertRow(table.rows.length);
            newRow.setAttribute("value",itemId);
//            console.info(newRow);
            
            var newCell = newRow.insertCell(0);
            var newText = document.createTextNode(table.rows.length);
            newCell.appendChild(newText);
            newCell.style.borderRight ="1px solid black";

            
            newCell = newRow.insertCell(1);
            newText = document.createTextNode(cell0);
            newCell.appendChild(newText);
            
            newCell = newRow.insertCell(2);
            newText = document.createTextNode(cell1);
            newCell.appendChild(newText);
            newCell.setAttribute("value",cell1Value);
            newCell = newRow.insertCell(3);
            
            newText = document.createTextNode(cell2);
            newCell.appendChild(newText);
            newCell.style.color = cell2;
            newCell.setAttribute("value",cell2Value);
            
            
            newCell = newRow.insertCell(4);
            newCell.innerHTML =("<img src=\"Resources/deletered.png\" height=\"20\" width=\"20\" style=\"cursor:pointer\" onclick=\"deleteRow(this)\"> ");
            
            updateIndecies();
            updateTotal();
            var image = document.getElementById('imageAddedItem');
            console.info(image);
            image.style.display = 'block';
            image.style.opacity = 0.6;
            
            setTimeout(function(){
                image.style.display = 'none';
                                 },2000);
        }
function addRowToDE(element){
    
    var father = element.parentNode;
    var cln = father.cloneNode(true);
    element.remove();
    cln.getElementsByClassName('deleteRow')[0].style.display = "inline-block";
    var table = document.getElementById('itemRows');
    table.appendChild(cln);
    document.getElementById('rowNumbers').nodeValue++ ;
}
function updateTotal()
        {
            var m =0 ;
            var table = document.getElementById('orderList');
            var len = table.rows.length;
           for (var i = 0, row; row = table.rows[i]; i++) 
            {
                cell = row.cells[1].innerText;
                m = m + parseInt(cell);
            }
            var total = document.getElementById("total");
            total.innerHTML = m + "$";
            total.setAttribute("value",m);
//            console.info(total.value);
        }
function colorsToSize(element)
{
    var valueSize = element.value;
//    console.info(itemId);
    var table = element.parentNode.parentNode;
    var disableColors = table.getElementsByClassName('colors')[0];
    var children = disableColors.childNodes;
    for(var i = 0 ; i < children.length ;i++)
    {
        children[i].style.display = "none";
    }
    
    var colors = table.getElementsByClassName(valueSize);
    for(var i = 0 ;i < colors.length ;i++)
    {
        colors[i].style.display = "block";
    }
}
function orderListArray()
{
    var table = document.getElementById('orderList');
    var items = Array();
        items['Total'] = document.getElementById('total').getAttribute("value");
        items['NumberOfItems'] = table.rows.length;
    if(items['NumberOfItems'] == 0)
    {
        alert("Please Add Items");
        return ;
    }
    var sizeName = "SizeId";
    var colorName = "ColorId";
    var itemId = "ItemId";
    for (var i = 0, row; row = table.rows[i]; i++) 
            {
                temp = itemId + i;
                items[temp] = row.getAttribute("value"); 
                temp = sizeName + i;
                items[temp] = row.cells[2].getAttribute("value");
                temp = colorName + i;
                items[temp] = row.cells[3].getAttribute("value");
            }
    submitOrder("index.php",items);
}

function submitOrder(path,params)
{
    method = "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}    
