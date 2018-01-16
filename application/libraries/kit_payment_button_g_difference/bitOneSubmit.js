var submitTOBitOne = function(){

   //Fields
   var apiKey = document.getElementById('b1_apiKey').value;
   var totalAmount = document.getElementById('b1_totalAmount').value;
   var items = document.getElementById('b1_items').value;
   var currency = document.getElementById('b1_currency').value;
   var referenceTag = document.getElementById('b1_referenceTag').value;

   var b1Form = document.createElement('form');

   b1Form.setAttribute('action', 'https://checkout.bit.one/merchant');
   b1Form.setAttribute('method', 'post');
   b1Form.setAttribute('hidden', 'true');
	
   var b1_ak = document.createElement('input');
   b1_ak.setAttribute('type', 'text');
   b1_ak.setAttribute('name', 'b1_ak');
   b1_ak.setAttribute('value', apiKey);
   b1_ak.setAttribute('id', 'b1_ak');
	
   b1Form.appendChild(b1_ak);
   
   var b1_total_amount = document.createElement('input');
   b1_total_amount.setAttribute('type', 'text');
   b1_total_amount.setAttribute('name', 'b1_total_amount');
   b1_total_amount.setAttribute('value', totalAmount);
   b1_total_amount.setAttribute('id', 'b1_total_amount');
	
   b1Form.appendChild(b1_total_amount);
     
   var b1_items = document.createElement('input');
   b1_items.setAttribute('type', 'text');
   b1_items.setAttribute('name', 'b1_items');
   b1_items.setAttribute('value', items);
   b1_items.setAttribute('id', 'b1_items');
	
   b1Form.appendChild(b1_items);
   
   var b1_cur = document.createElement('input');
   b1_cur.setAttribute('type', 'text');
   b1_cur.setAttribute('name', 'b1_cur');
   b1_cur.setAttribute('value', currency);
   b1_cur.setAttribute('id', 'b1_cur');
	
   b1Form.appendChild(b1_cur);
   
   
   var b1_referenceTag = document.createElement('input');
   b1_cur.setAttribute('type', 'text');
   b1_cur.setAttribute('name', 'b1_referenceTag');
   b1_cur.setAttribute('value', referenceTag);
   b1_cur.setAttribute('id', 'b1_referenceTag');
	
   b1Form.appendChild(b1_referenceTag);
   
     
   document.body.appendChild(b1Form);
	
   b1Form.submit();
   
}