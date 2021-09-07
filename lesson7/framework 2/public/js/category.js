$(document).on('click', '.category-link', function(){
    if (!$('#catalog-data').length) {
        return true;
    }
    var self = $(this);
    $.ajax({
        url: '/index.php?page=categories&action=index&id=' + self.attr('link') + '&asAjax=true',
        type: 'GET',
        dataType: 'json'
    }).done(function(data) {
        var categoryList = $('<ul></ul>');
        var catalogData = $('#catalog-data');
        catalogData.empty();
        for (var item in data.subcategories) {
            var category = $('<a>');
            category.attr('href', "/index.php?page=categories&id=" + data.subcategories[item].id);
            category.attr('link', data.subcategories[item].id);
            category.addClass('category-link');
            category.html(data.subcategories[item].name);
            categoryList.append('<li>' + category[0].outerHTML + '</li>');
        }
        catalogData.html(categoryList.html());
    });
    return false;
});
