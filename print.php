<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DV Generator CAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/print.css" media="print">
</head>
<body style="word-spacing:0;font-size:13px;">
<form>
<table style="line-height:1px;width:100%;background-color:grey;">
<tr>
<td>
<table>
	<tr>
		<td>
		<img src="images/OWWA_logo.jpg" style="width:100px;height:100px;">
		</td>
		<td style="font-size:12px;font-family:verdana;">
			<p>Republic of the Philippines</p>
			<p>Department of Labor and Employment</p>
			<p>Overseas Workers Welfare Administration</p>
			<p>Cordillera Administrative Region</p>
			<p># 17 RM Bldg., Private Rd., Magsaysay Ave., Baguio City</p>
			<p>car@owwa.gov.ph/ (074) 445-2260</p>
		</td>
	</tr>
	<tr>
        <td colspan="2"><h1>DISBURSEMENT VOUCHER</h1></td>
	</tr>
</table>
</td>
<td>
<table style="float:left">
	<tr>
		<td>
			DV. No.
		</td>
		<td>
		<input type="text" name="dv_number"/>
		</td>
	</tr>
	<tr>
		<td>By:</td>
		<td>
		<input type="text" name="generated_by"/>
		</td>
	</tr>
	<tr>
		<td>Date</td>
		<td>
			<input type="date" name="date"/>
		</td>
	</tr>
	<tr>
		<td>Fund Cluster</td>
		<td>
			<input type="text" name="fund_cluster"/>
		</td>
	</tr>
		<td>OR/ BUS</td>
		<td>
		<input type="text" name="bus"/>
		</td>
	
</table>
</td>
</tr>
</table>
<hr>
<table width="100%">
<tr>
<td>
<table width="90%" style="text-align:center;">
	<tr>
		<td colspan="5">MODE OF PAYMENT</td>
	</tr>
	<tr>
		<td><input type="radio" name="mds_check"/><label>MDS Check</label></td>
		<td><input type="radio" name="commercial_check"/><label>Commercial Check</label></td>
		<td><input type="radio" name="ada"/><label>ADA</label><td>
		<td><input type="radio" name="others"/><label>Others</label></td>
	</tr>
</table>
</td>
<td>
<table>
	<tr>
		<td>Responsibility Center</td>
		<td><input type="text" name="responsibility_center"/></td>
	</tr>
	<tr>
		<td style="text-align:right;">MFO/PAP</td>
		<td><input type="text" name="mfo/pap"/></td>
	</tr>
</table>
</td>
</table>
<div>
	<label>Payee</label>&nbsp;<input type="text" style="width:65%" name="payee"/>
	<label>TIN</label>&nbsp;<input type="text" style="width:20%" name="tin"/><br>
	<label>Address</label>&nbsp;<input type="text" style="width:90%" name="address"/>
</div>

<table width="100%">
<tr>
<td width="90%">
	<table style="border:1px solid;border-collapse:collapse;width:100%;">
		<tr>
			<td width="70%" style="border:1px solid;">Particulars</td>
			<td width="30%" style="border:1px solid;">Amount in Words</td>
		</tr>
		<tr>
			<td style="border:1px solid;padding:5px;"><textarea name="particulars" cols="1" rows="5" style="width:90%; resize:none;border-style:none"></textarea></td>
			<td><textarea name="amount_in_words" cols="1" rows="5" style="width:90%; resize:none;border-style:none"></textarea></td>
		</tr>
	</table>
</td>
	<td>
	<table>
	<table>
		<tr>
			<td>Amount</td>
		</tr>
		<tr>
			<td><input type="text" style="height:30px;" name="amount_in_number"/></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>EWT&nbsp;</td>
			<td><input type="text"style="width:40px;" name="ewt"/></td>
		</tr>
		<tr>
			<td>VAT/PT&nbsp;</td>
			<td><input type="text"style="width:40px;" name="vat/pt"/></td>
		</tr>
		<tr>
			<td>Total&nbsp;</td>
			<td><input type="text"style="width:40px;" name="total"/></td>
		</tr>
	</table>
	</table>
	</td>
	</tr>
</table>
<table style="text-align:center;width:100%;">
	<tr>
		<td>
            <b>A. Certified: Expenses / Cash Advance necessary, lawful and under my direct supervision.</b>
		</td>
	</tr>
	<tr><td style="height:30px;"></td>
	</tr>
	<tr>
		<td>
		<b>WINDELIN DC. MARQUEZ</b>
		</td>
	</tr>
	<tr>
		<td>
		<b>OIC, PSD</b>
		</td>
	</tr>
	<tr>
		<td>Date:&nbsp;<input type="date" name="date_of_certification"/></td>
	</tr>
</table>
<div style="padding:0 10px;">
<table style="border:1px solid;border-collapse: collapse;width:100%">
	<thead>
		<tr><td colspan="6" style="text-align:center"><b>B. Accounting Entry</b></td></tr>
		<tr>
			<th width="10%" style="border:1px solid;">Account Code</th>
			<th width="10%" style="border:1px solid;">UACTS Code</th>
			<th width="40%" style="border:1px solid;">Account Title</th>
			<th width="5%" style="border:1px solid;">Debit</th>
			<th width="5%" style="border:1px solid;">Credit</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td style="border:1px solid;text-align:center;"><textarea name="account_code" cols="1" rows="5" style="width:85%; resize:none;border-style:none"></textarea></td>
			<td style="border:1px solid;text-align:center;"><textarea name="uacs_code"cols="1" rows="5" style="width:85%; resize:none;border-style:none"></textarea></td>
			<td style="border:1px solid;text-align:center;"><textarea name="title" cols="1" rows="5" style="width:85%; resize:none;border-style:none"></textarea></td>
			<td style="border:1px solid;text-align:center;"><textarea name="debit" cols="1" rows="5" style="width:85%; resize:none;border-style:none"></textarea></td>
			<td style="border:1px solid;text-align:center;"><textarea name="credit" cols="1" rows="5" style="width:85%; resize:none;border-style:none"></textarea></td>
		</tr>
		</tbody>
	</table>
</div>
<br>
<table width="100%" style="border:1px solid;border-collapse: collapse;line-height:5px;">
<tr>
	<td width="50%">
	<table style="width:100%;">
		<tr >
			<td style="width:100%"><b>C. Certified</b></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="certified_by_1"/>Supporting documents complete and proper.</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="certified_by_2"/>Cash available.</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="certified_by_3"/>Subject to ADA (if applicable).</td>
		</tr>
	</table>
	</td>
	<td width="50%">
	<table style="width:100%;border-left:1px solid;">
		<tr>
		<td style="width:100%;height:13px;"><b>D. Approved for payment</b></td>
		</tr>
		<tr><td><textarea name="approved_for_payment"cols="1" rows="5" style="width:90%; resize:none;border-style:none"></textarea></td></tr>
	</table>
	</td>
</tr>
</table>
<br>
<br>
<br>
<div style="margin:0 80px;">
	<table style="text-align:center;width:100%;line-height:1px">
		<tr>
		<td style="text-align:right;">Signature:</td>
		<td>___________________________</td>
		<td style="text-align:right;">Signature:</td>
		<td>___________________________</td>
		</tr>
		<tr>
		<td style="text-align:right;">Name and Position:</td>
		<td><p>BANOAR R. ABRATIQUE</p>
				<p>Accountant</p></td>
		<td style="text-align:left;">Name and Position:</td>
		<td><p>WINDELIN DC. MARQUEZ</p>
				<p>Officer-in-Charge</p></td>
		</tr>
		<tr>
		<td style="text-align:right;" name="date_signed_accountant">Date:</td>
		<td><input type="date"/></td>
		<td style="text-align:right;" name="date_signed_officer_in_charge">Date:</td>
		<td><input type="date"></td>
		</tr>
		
	</table>
</div>
<br>
<br>
<center><b>E. Receipt of Payment</b></center>
<div style="width:100%;margin:0 9px;">
<div style="border:1px solid;width:70%;float:left">
<table>
	<tr>
		<td width="20%">Check Number</td>
		<td><input type="text" name="check_number"/></td>
		<td width="20%">Check Date</td>
		<td><input type="date"style="width:250px;" name="check_date" /></td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td width="10px;">Payee</td>
		<td width="95%"><input type="text" style="width:100%" name="payee"/></td>
		<td width="10px;">Amount</td>
		<td><input type="text" name="amount_in_number" style="width:90px"/></td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td width="10px;">Signature</td>
		<td><input type="text" style="width:90%"/></td>
		<td width="10px;" >Date:</td>
		<td><input type="date"/></td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td width="15%">OR No. / Other Documents</td>
		<td colspan="3"><input type="text" style="width:95%"/></td>
	</tr>
</table>
</div>
<div style="float:left;width:20%;border:1px solid;">
<table style="width:80%;">
	<tr>
		<td>JEV No.</td>
		<td style="border:1px solid"><input type="text"style="border-style:none;font-size:30px;width:130px;height:50px;"></td>
	</tr>
</table>
<table>
	<tr>
		<td>JEV Date:</td>
		<td>
			<input type="text"style="font-size:16px;width:120px;height:30px;">
		</td>
	</tr>
</table>
</div>
</div>
</form>
</body>
</html>