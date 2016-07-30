"use strict";
var classes_ = objectlink.gOrm("gT2",[["Класс"],[],[0],false,["Класс","id_Класс"]]);
var classes = hash4arr(classes_);


QUnit.test( "essp test", function( a ) {
	a.ok( true == true, "true" );
	
	a.ok( new TDomValue(cInp("edit"), "123").value == "123", "TDomValue 1" );
	a.ok( new TDomValue(cInp("date"), "2016-10-10", function(that){return "["+that._dom.value+"]"}).value == "[2016-10-10]", "TDomValue 2" );

	a.ok( new TEdit("123").value == "123", "TEdit" );
	a.ok( new TDate("2016-10-10").value == "2016-10-10", "TDate" );
	a.ok( new TMemo("123").value == "123", "TMemo" );
	a.ok( new TCombo("2", [[1,1],[2,2]]).value == "2", "TCombo 1" );
	a.ok( new TCombo("2", [[1,1],[2,2]]).dom.type == "select-one", "TCombo 2" );
	a.ok( new TCombo("2", [[1,1],[2,2]]).dom.getElementsByTagName("option").length == 3, "TCombo 3" );
	
	var cntf = new ContainerFactory();
	a.ok( cntf.create("combo", null, "2", [[1,1],[2,2]]).value == "2", "ContainerFactory combo" );
	
	var div = document.body.appendChild(cDom("DIV"));
	var zdp, zdz;
	var zakaz = new Objects(classes["Заказы ПИР"], null, cntf.create("hidden", div, "", null, function(that){
		return "Заказ "+(zdp.value || d2str(new Date()))
	}));
	
	zdp = new Objects(classes["Заказы дата подписания"], null, cntf.create("date", div), zakaz);
	zdz = new Objects(classes["Заказы дата закрытия"], null, cntf.create("date", div), zakaz);
	a.ok( zdz.parentObject === zdp.parentObject, "Object parentObject");
	
	var arr = [zakaz, zdp, zdz];
	var but = cDom("BUTTON", null, div);
	but.innerHTML = "save";
	but.onclick = function() {
		for (var i=0; i < arr.length; i++) {
			arr[i].save();
			console.log(arr[i].oid);
		}
	}
	
});




