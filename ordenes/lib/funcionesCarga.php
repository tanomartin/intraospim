<script type="text/javascript">
	
function verificaCuil(sCUIT) {
	var aMult = '5432765432';
    aMult = aMult.split('');
    
    if (sCUIT && sCUIT.length == 11) {
        aCUIT = sCUIT.split('');
        var iResult = 0;
        for(var i = 0; i <= 9; i++) {
            iResult += aCUIT[i] * aMult[i];
        }
        iResult = (iResult % 11);
		if (iResult == 1) iResult = 0;
		if (iResult != 0) iResult = 11 - iResult;
		
        if (iResult == aCUIT[10]) {
			document.forms.nuevaSolicitud.verCuil.disabled=false;	
			return true;	
        } else {
			alert("CUIL INVALIDO");
			document.forms.nuevaSolicitud.verCuil.disabled=true;
			return false;
		}
    } else {
		if (sCUIT  && sCUIT.length != 11) {
			alert("CUIL INVALIDO");
			document.forms.nuevaSolicitud.verCuil.disabled=true;
			return false;	
		} else {
			alert("CUIL INVALIDO");
			document.forms.nuevaSolicitud.verCuil.disabled=true;
			return false;	
    	}
		alert("CUIL INVALIDO");
		document.forms.nuevaSolicitud.verCuil.disabled=true;
		return false;	
	}
}

</script>