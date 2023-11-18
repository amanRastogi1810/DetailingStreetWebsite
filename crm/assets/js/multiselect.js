sanMultiSelectObj={
		IE:	document.all?true:false,
		selType:'',
		nType:'',
		sLists:'',
		ALists:Array(),
		SLists:Array(),
		init:function ()
		{
			this.selType = document.getElementsByTagName("ul");
//			ALists = new Array;
			var q = 0;
			for(var i=0;i<this.selType.length;i++)
			{
				if(this.selType[i].getAttribute("sanType")!=null){
					var chkUl = this.selType[i].getAttribute("sanType");
					if(chkUl.indexOf("simple")>(-1))
					{
						var uiAr = chkUl.split("#");
						var col = 1;
						if(uiAr.length>1){	col = uiAr[1];	}
						var cntr = this.selType[i].parentNode.id;
						var uId = this.selType[i].id;
						var ulCls = this.selType[i].className;
						var oLists = this.selType[i].getElementsByTagName("li");
						var iLists= new Array();
						
						for(var j=0; j<oLists.length; j++)
						{
							(oLists[j].getAttribute("selected"))? sel=1:sel=0;
							//sel = oLists[j].getAttribute("value");
							var iTems = "iT:\""+oLists[j].innerHTML+"\", v:\""+oLists[j].innerHTML+"\"";
							if(oLists[j].getAttribute("id"))
							{	iTems = "iT:\""+oLists[j].innerHTML+"\", v:\""+oLists[j].getAttribute("id")+"\"";	}							
							
							if(oLists[j].getAttribute("imgsrc"))// check for image avalability to display in from of line //
							{	
								dipImage = oLists[j].getAttribute("imgsrc");
								iTems+=",  dImage:\""+dipImage+"\"";	
							}
							
							iTems+=",  slct:\""+sel+"\"";
							iLists.push("{"+iTems+"}");
						}
						var iList = "{ sRows:{sId:\""+q+"\", liCols:\""+col+"\", pId:\""+cntr+"\", ulId:\""+uId+"\", ulCls:\""+ulCls+"\", oPtns:["+iLists+"]}}";
						this.ALists.push(iList);
						q++;
					}
				}
			}
			this.sLists = "["+this.ALists+"]";
			this.ALists = eval(this.sLists);
			this.SLists = this.ALists;
			if(this.ALists.length>0)
			{	this.BoundItems();	}
		},
		chkClick:function(chk){
			if(chk.checked==false)
			{	chk.checked = false; chk.parentNode.className = "liDeSelect";	}
		
			else{ 	chk.checked = true;   chk.parentNode.className = "liSelect";	}
		},
		BoundItems:function(){
			if(this.SLists.length>0){
				for(var i=0;i<this.SLists.length; i++)
				{
					var ULele = this.crEle("ul");
					var lCols = parseInt(this.SLists[i].sRows.liCols);
					var liLen = this.SLists[i].sRows.oPtns.length;
					for(var j=0;j<liLen;j++)
					{
						//alert(this.SLists[i].sRows.oPtns[j].v+"  "+this.SLists[i].sRows.oPtns[j].slct);
						var liEle = this.crEle("li");
						if(lCols>1){ 		liEle.style.cssText = " display:inline; width:275px; float:left;";	}
						var chkEle = this.crEle("input");
						var l = {	"type":"checkbox", "id":"chkItems"+i+j, "name":this.SLists[i].sRows.ulId+"[]", "value":this.SLists[i].sRows.oPtns[j].v};
						this.X(chkEle, l);
						this.addChild(liEle, chkEle);
						if(this.SLists[i].sRows.oPtns[j].slct=="1")
						{	liEle.className = "liSelect";	chkEle.checked=true;	}
						else{	liEle.className = "liDeSelect";	chkEle.checked=false;	}
						
						chkEle.onclick = function(){	sanMultiSelectObj.chkClick(this);	}
						this.addChild(liEle, document.createTextNode(html_entity_decode(this.SLists[i].sRows.oPtns[j].iT)));
						
						if(this.SLists[i].sRows.oPtns[j].dImage) { // chek for image //
							var imgEle = this.crEle("img");
							var imgAtr = {	"src":""+this.SLists[i].sRows.oPtns[j].dImage, "width":"52", "height":"30"};
							this.X(imgEle, imgAtr);
							this.addChild(liEle, imgEle);	
						}
	
						this.addChild(ULele, liEle);
						
					}
					var yEle = document.getElementById(this.SLists[i].sRows.pId);
					if(lCols>1){ 
						var ll = 30;
						var tRws = Math.ceil(liLen/lCols);						
						ll = ll+(tRws*ll);
						yEle.style.cssText = " height:"+ll+"px; overflow:auto;";	
					}
					var y = yEle.innerHTML;
					yEle.innerHTML = "";
					var div1 = this.crEle("div");
					var k = {"id":"topSMSOdiv"+this.SLists[i].sRows.sId, "width":"98%", "font-size":"10px", "font-weight":"bold", "cursor":"pointer"};
					this.X(div1, k);
					div1.className = "eventLink";
					this.addChild(yEle, div1);
					var lnk1 = this.crEle("a");
					k = {"href":"javascript:void(0);", "class":"UpperLink", "rel":this.SLists[i].sRows.sId};
					lnk1.onclick = function(){	sanMultiSelectObj.chkUnchk(this.rel, true, "liSelect");	}
					this.X(lnk1, k);
					this.addChild(div1, lnk1);
					this.addChild(lnk1, document.createTextNode("All"));
					
					lnk1 = this.crEle("a");
					k = {"href":"javascript:void(0);", "class":"UpperLink", "rel":this.SLists[i].sRows.sId};
					lnk1.onclick = function(){	sanMultiSelectObj.chkUnchk(this.rel, false, "liDeSelect");	}
					this.X(lnk1, k);
					this.addChild(div1, lnk1);
					this.addChild(lnk1, document.createTextNode("None"));
					
					lnk1 = this.crEle("a");
					k = {"href":"javascript:void(0);", "class":"UpperLink", "rel":this.SLists[i].sRows.sId};
					lnk1.onclick = function(){	sanMultiSelectObj.chkReset(this.rel);	}
					this.X(lnk1, k);
					this.addChild(div1, lnk1);
					this.addChild(lnk1, document.createTextNode("Reset"));
					
					var div2 = this.crEle("div");
					k = {"id":"midSMSOdiv"+this.SLists[i].sRows.sId, "width":"98%", "font-size":"10px", "font-weight":"bold", "cursor":"pointer"};
					this.X(div2, k);
					this.addChild(yEle, div2);
					this.addChild(div2,ULele);
										
				}				
			}
		},
		doneEvent:function(ele, p){
			document.getElementById('topSMSOdiv'+p).onclick = function(){	return false;	}
			document.getElementById('midSMSOdiv'+p).onclick = function(){	return false;	}
			if(this.IE){	ele.setAttribute('innerText', "Edit");	}
			else{	ele.innerHTML = "Edit";	}
					
		},
		chkReset:function(p){
			var dId = document.getElementById('midSMSOdiv'+p).getElementsByTagName("input");
			for(i=0;i<dId.length;i++)
			{
				if(dId[i].getAttribute("type")=="checkbox")
				{
					if(this.SLists[p].sRows.oPtns[i].slct=="1")
					{	dId[i].checked = true;	dId[i].parentNode.className = "liSelect";	}
					else{	dId[i].checked = false;	dId[i].parentNode.className = "liDeSelect";	}	
				}
			}
		},
		chkUnchk:function(p, dp, cN){
			var dId = document.getElementById('midSMSOdiv'+p).getElementsByTagName("input");
			
			for(i=0;i<dId.length;i++)
			{
				if(dId[i].getAttribute("type")=="checkbox")
				{	dId[i].checked = dp; dId[i].parentNode.className = cN;	}
			}
		},
		X: function(o,a){
			for(i in a)o[i]=a[i];
		},
		addChild: function(_T,a){
			_T.appendChild(a);
		},
		crEle: function(t)
		{
			return document.createElement(t);
		}
	}

sanMultiSelectObj.init();