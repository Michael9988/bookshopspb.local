/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function changeDelivery(select){
    if (select.value === "") return;
    if (select.value === "0") document.getElementById("address").style.display="table-row";
    else document.getElementById("address").style.display="none";
}


