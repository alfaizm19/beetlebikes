var htmltempcrop='<div class="img-wrapper" style="max-height:{height}px;max-width:{width}px"> <div class="imageBox" id="imageBox_{id}" style="height:{height}px;width:{width}px">  <div class="thumbBox" id="thumbBox_{id}" style="top:{top};left:{left}px;width: {original_width}px;height: {original_height}px;"></div> <div class="spinner" id="spinner_{id}" style="display: none">Loading...</div></div></div> <input type="hidden" name="crop_{id}" id="crop_{id}" value="" /><input type="button" class="btn btn-primary" id="btnPreview_{id}" value="Preview"> <input type="button" class="btn btn-primary" id="btnCrop_{id}" value="Crop"> <input class="btn btn-primary" type="button" id="btnZoomIn_{id}" value="+" > <input class="btn btn-primary" type="button" id="btnZoomOut_{id}" value="-"> ';function image_crop(t){var i=$("#"+t);i.attr("data-image-crop","2");t=i.attr("id");var e=parseInt(i.attr("data-image-height"))+75,a=parseInt(i.attr("data-image-width"))+75,n=parseInt(i.attr("data-image-height")),o=parseInt(i.attr("data-image-width")),r=(e-n)/2,p=(a-o)/2;i.wrap("<div class='cropoutterwrap'></div>");var d=$(i.parents("div.cropoutterwrap:first"));d.append("<span class='croptooldiv'></span>"),d.append("<style>#imageBox_"+t+"{width:"+a+"px;height:"+e+"px}</style>"),d.append("<style>#thumbBox_"+t+"{left:"+p+"px;top:"+r+"px;width:"+o+"px;height:"+n+"px}</style>"),d.find(".croptooldiv:first").append(htmltempcrop.replace(/{id}/g,t).replace(/{height}/g,e).replace(/{width}/g,a).replace(/{original_height}/g,n).replace(/{original_width}/g,o).replace(/{left}/g,p).replace(/{top}/g,r)),YUI().use("node","crop-box",function(e){var a,n={imageBox:"#imageBox_"+t,thumbBox:"#thumbBox_"+t,spinner:"#spinner_"+t,imgSrc:""};e.one("#"+t).on("change",function(){var o=new FileReader;o.onload=function(t){n.imgSrc=t.target.result,a=new e.CropBox(n)},""!=i.val()&&o.readAsDataURL(this.get("files")._nodes[0]),this.get("files")._nodes=[],setTimeout(function(){$("#btnCrop_"+t).trigger("click")},500)}),e.one("#btnCrop_"+t).on("click",function(){if(void 0!=a){var i=a.getAvatar();$("#crop_"+t).val(i)}}),e.one("#btnZoomIn_"+t).on("click",function(){a.zoomIn()}),e.one("#btnZoomOut_"+t).on("click",function(){a.zoomOut()}),e.one("#btnPreview_"+t).on("click",function(){""!=$("#crop_"+t).val()&&($("#imgPreview").attr("src",$("#crop_"+t).val()),$("#modelPreview").modal("show"))})})}$(function(){setInterval(function(){$("[data-image-crop='1']").each(function(t){image_crop($(this).attr("id"))})},500)});