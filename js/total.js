

function ViewSum(){ 

var diff=0;
var nSum=0;

var amount=parseInt(document.getElementById('amount_in_number').value);
var ewt=parseInt(document.getElementById('ewt').value);
var vat_pt=parseInt(document.getElementById('vat_pt').value);


nSum=ewt+vat_pt;
diff=amount-nSum;
document.getElementById("Result").innerHTML=diff;
}

