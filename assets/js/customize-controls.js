jQuery(document).ready((function(){wp.customize.controlConstructor["backdrop-radio-image"]=wp.customize.Control.extend({ready:function(){for(var t=this,e=document.querySelectorAll(t.selector+' input[type="radio"]'),o=0;o<e.length;o++)e[o].onchange=function(){t.setting.set(this.value)}}})}));