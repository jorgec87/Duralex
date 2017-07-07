

function numberWithPuntos(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function getDataNotNull(obj){
	try{
		if(obj != null){
			return obj;
		}
	}
	catch(e){}
	return "";
}
