/**
 Collection script 2
 **/
let Collection = function () {

    //* BEGIN:CORE HANDLERS *//

    let createChild = function (child,child_class) {
        child = typeof child !== 'undefined' ? child : 'li';
        return '<' + child + ' class="' + child_class + ' list-group-item"></' + child + '>';
    };

    let handleEntity = function (collection, child) {
        let $addLink = $('<a href="#" class="btn btn-success btn-sm"><span><i class="fa fa-plus"></i><span> Agregar</span></span></a>');
        let $newLink = $(child).append($addLink);
        initDataForm(collection, $addLink, $newLink, child);
    };

    let initDataForm = function(collection, $addLink, $newLink, child){
        let $collectionHolder = $(collection);
        $collectionHolder.children('li').each(function() {
            addBlockFormDeleteLink($(this));
        });
        $collectionHolder.append($newLink);
        $collectionHolder.data('index', $collectionHolder.find('li').length);
        $addLink.on('click', function(e) {
            e.preventDefault();
            addBlockForm($collectionHolder, $newLink, child);
        });
    };

    let addBlockForm = function($collectionHolder, $newLink, child) {
        let prototype = $collectionHolder.data('prototype');
        let index = $collectionHolder.data('index');
        let newForm;
        if($collectionHolder.data('prototype-name')){
            let prototype_name = new RegExp($collectionHolder.data('prototype-name'), 'gi');
            newForm = prototype.replace(prototype_name, index);
        }
        else{
            newForm = prototype.replace(/__name__/g, index);
        }
        $collectionHolder.data('index', index + 1);
        let $newFormLi = $(child).append(newForm);
        $newLink.before($newFormLi);
        addBlockFormDeleteLink($newFormLi);

        return $newFormLi;
    };

    let addBlockFormDeleteLink = function($formLi) {
        let $removeFormA = $('<a href="#" class="btn btn-sm btn-danger" style="position: absolute; top: 5px; right: 5px;">X</a>');
        $formLi.append($removeFormA);
        $removeFormA.on('click', function(e) {
            e.preventDefault();
            if(confirm('Esta seguro de eliminar')){
                $formLi.remove();
            }
        });
    };

    //* END:CORE HANDLERS *//

    return {
        init: function (collection, child) {
            let custom_child = createChild(child, 'collection-item');
            handleEntity(collection, custom_child);
        },
    };

}();
