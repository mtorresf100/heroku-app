$(function(){"use strict";var o=$("#section-block"),e=$(".btn-section-block"),t=$(".btn-section-block-overlay"),s=$(".btn-section-block-spinner"),r=$(".btn-section-block-custom"),n=$(".btn-section-block-multiple"),c=$("#card-block"),l=$(".btn-card-block"),a=$(".btn-card-block-overlay"),i=$(".btn-card-block-spinner"),b=$(".btn-card-block-custom"),d=$(".btn-card-block-multiple"),g=$(".btn-page-block"),u=$(".btn-page-block-overlay"),p=$(".btn-page-block-spinner"),f=$(".btn-page-block-custom"),m=$(".btn-page-block-multiple"),k=$(".form-block"),v=$(".btn-form-block"),y=$(".btn-form-block-overlay"),C=$(".btn-form-block-spinner"),S=$(".btn-form-block-custom"),h=$(".btn-form-block-multiple");e.length&&o.length&&e.on("click",function(){o.block({message:'<div class="spinner-border text-white" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",border:"0"},overlayCSS:{opacity:.5}})}),t.length&&o.length&&t.on("click",function(){o.block({message:'<div class="spinner-border text-primary" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",border:"0"},overlayCSS:{backgroundColor:"#fff",opacity:.8}})}),s.length&&o.length&&s.on("click",function(){o.block({message:'<div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",border:"0"},overlayCSS:{opacity:.5}})}),r.length&&o.length&&r.on("click",function(){o.block({message:'<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p><div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5}})}),n.length&&o.length&&n.on("click",function(){o.block({message:'<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5},timeout:1e3,onUnblock:function(){o.block({message:'<p class="mb-0">Almost Done...</p>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.25},onUnblock:function(){o.block({message:'<div class="p-1 bg-success">Success</div>',timeout:500,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.25}})}})}})}),l.length&&c.length&&l.on("click",function(){c.block({message:'<div class="spinner-border text-white" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",border:"0"},overlayCSS:{opacity:.5}})}),a.length&&c.length&&a.on("click",function(){c.block({message:'<div class="spinner-border text-primary" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",border:"0"},overlayCSS:{backgroundColor:"#fff",opacity:.8}})}),i.length&&c.length&&i.on("click",function(){c.block({message:'<div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5}})}),b.length&&c.length&&b.on("click",function(){c.block({message:'<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p><div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5}})}),d.length&&c.length&&d.on("click",function(){c.block({message:'<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5},timeout:1e3,onUnblock:function(){c.block({message:'<p class="mb-0">Almost Done...</p>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.25},onUnblock:function(){c.block({message:'<div class="p-1 bg-success">Success</div>',timeout:500,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.25}})}})}})}),g.length&&g.on("click",function(){$.blockUI({message:'<div class="spinner-border text-white" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",border:"0"},overlayCSS:{opacity:.5}})}),u.length&&u.on("click",function(){$.blockUI({message:'<div class="spinner-border text-primary" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",border:"0"},overlayCSS:{backgroundColor:"#fff",opacity:.8}})}),p.length&&p.on("click",function(){$.blockUI({message:'<div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",border:"0"},overlayCSS:{opacity:.5}})}),f.length&&f.on("click",function(){$.blockUI({message:'<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5}})}),m.length&&m.on("click",function(){$.blockUI({message:'<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5},timeout:1e3,onUnblock:function(){$.blockUI({message:'<p class="mb-0">Almost Done...</p>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5},onUnblock:function(){$.blockUI({message:'<div class="p-1 bg-success">Success</div>',timeout:500,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5}})}})}})}),v.length&&k.length&&v.on("click",function(){k.block({message:'<div class="spinner-border text-white" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5}})}),y.length&&k.length&&y.on("click",function(){k.block({message:'<div class="spinner-border text-primary" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",border:"0"},overlayCSS:{backgroundColor:"#fff",opacity:.8}})}),C.length&&k.length&&C.on("click",function(){k.block({message:'<div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5}})}),S.length&&k.length&&S.on("click",function(){k.block({message:'<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5}})}),h.length&&k.length&&h.on("click",function(){k.block({message:'<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.5},timeout:1e3,onUnblock:function(){k.block({message:'<p class="mb-0">Almost Done...</p>',timeout:1e3,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.25},onUnblock:function(){k.block({message:'<div class="p-1 bg-success">Success</div>',timeout:500,css:{backgroundColor:"transparent",color:"#fff",border:"0"},overlayCSS:{opacity:.25}})}})}})})});
