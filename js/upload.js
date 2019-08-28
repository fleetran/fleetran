var feedback = function(res) {
    if (res.success === true) {
        var get_link = res.data.link.replace(/^http:\/\//i, 'https://');
        document.querySelector('.status').innerHTML =
            '<br><input type="hidden" name="carnet-imagen" class="image-url" value=\"'+get_link+'\"/>' + '<img class="img" style="width:10%;" src=\"' + get_link + '\"/>';
    }
};

new Imgur({
    clientid: '6830b8a94cc8aee', //You can change this ClientID
    callback: feedback
});