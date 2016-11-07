const logoZarphRacio = 0.709; //variável para manter o logo da Zarph com o aspeto correto
var imagesURL = []; //array para guardar as imagens a carregar no PDF
var imagesLoaded = 0; //variável que gere as imagens carregadas no PDF

var addImage = function (url, width, height) {
    imagesURL[images.length] = { 'url': url, 'width': width, 'height': height };
}

var imageLoaded = function(conteudo, reportName){            
    config(); // vem do ficheiro configDataPDF.js

    var docDefinition = {
        pageMargins: this._pageMargins, 
        pageSize : this._pageSize,
        fontSize: this._fontSize,
        content: conteudo,                    
        footer: minimalFooterWithPrintDate, //minimalFooter, // vem do ficheiro footer.js
        header: minimalHeader, // vem do ficheiro header.js         
        styles: stylesPDF
    };

    pdfMake.createPdf(docDefinition).download(reportName);
}

var getDataUri = function (imageref, conteudo, reportName) {
    var image = new Image();

    image.onload = function () {
        var canvas = document.createElement('canvas');
        canvas.width = this.naturalWidth; // or 'width' if you want a special/scaled size
        canvas.height = this.naturalHeight; // or 'height' if you want a special/scaled size
        canvas.getContext('2d').drawImage(this, 0, 0);
        imagesURI[imagesURI.length] = { "dataURI": canvas.toDataURL('image/png'), "width": imageref.width, "height": imageref.height };
        if (++imagesLoaded == imagesURL.length)
            imageLoaded(conteudo, reportName);
        else
            getDataUri(imagesURL[imagesLoaded], conteudo, reportName);
    }
    image.onerror = function () {
        alert('Error on image loading');
        console.error("error loading image: " + imageref.url);
        imageLoaded();
    }
    image.src = imageref.url;
}

var exportPDF = function (images, conteudo, reportName) {
    getDataUri(imagesURL[imagesLoaded], conteudo, reportName);
}