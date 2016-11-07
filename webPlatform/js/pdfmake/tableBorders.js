var bottomLineInTable = {
    hLineWidth: function(i, node) {
        return (i === node.table.body.length) ? 0.5 : 0;
    },
    hLineColor: function(i, node){
        return zarphColor; //styles.js
    },
    vLineWidth: function(i, node) {
        return 0;
    }
}

var middleLineInTable = {
    hLineWidth: function(i, node) {
        return (i === node.table.body.length-1) ? 1 : 0;
    },
    hLineColor: function(i, node){
        return zarphColor; //styles.js
    },
    vLineWidth: function(i, node) {
        return 0;
    }
}

var horizontalLinesInTable = {
    hLineWidth: function(i, node) {
        return 0.5;
    },
    hLineColor: function(i, node){
        return zarphColor; //styles.js
    },
    vLineWidth: function(i, node) {
        return 0.5;
    },
    vLineColor: function(i, node){
        return zarphColor; //styles.js
    }
}

var horizontalLinesInTableWithTotals = {
    hLineWidth: function(i, node) {
        return 0.5; // (i < node.table.body.length - 1) ? 0.5 : 0;
    },
    hLineColor: function(i, node){
        return zarphColor; //styles.js
    },
    vLineWidth: function(i, node) {
        return 0.5; //(i < node.table.body.length - 2) ? 0.5 : 0;
    },
    vLineColor: function(i, node){
        return zarphColor; //styles.js
    }
}

var borders = {
    hLineWidth: function(i, node) {
        return i > 1 ? 0.5 : 0;
    },
    vLineWidth: function(i, node) {
        return 0;
    }
}
