var language = class{
    //langid, name, nativename, 
    constructor(langID, name, nativeName){
        this.langID = langID;
        this.name = name;
        this.nativeName = nativeName;
    }

    get langID(){
        return this.langID;
    }
    
    get name(){
        return this.name;
    }

    get nativeName(){
        return this.nativeName;
    }
}