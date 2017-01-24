$('.numberOnly').keypress(function(event)
{
    var val = 0
    if(event.charCode>57 || event.charCode<48)
        event.preventDefault()
    else
        val = Number(event.target.value+String.fromCharCode(event.charCode))
        
    if(event.target.id==='quantity')
    {
        if(val<1 || val>99)
            event.preventDefault()
    }
})

$.LoadingOverlaySetup({
    color           : "rgba(0, 0, 0, 0.4)",
    image           : "/img/loading.gif",
    maxSize         : "80px",
    minSize         : "20px",
    resizeInterval  : 0,
    size            : "50%"
})

$(document).ajaxStart(function()
{
    $.LoadingOverlay("show",{  })
})

$(document).ajaxStop(function()
{
    $.LoadingOverlay("hide")
})