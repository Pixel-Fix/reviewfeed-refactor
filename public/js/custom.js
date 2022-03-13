$(document).ready(function(){
    localStorage.clear();

    $('#btnLogout').click(function(){
        $('#frmLogout').submit();
    });

    var companies = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,

        remote: {
          url: '/ajax/companies/name?name=%QUERY',
          wildcard: '%QUERY'
        }
      });

    $('#company').typeahead(null, {
        name: 'companies',
        display: 'name',
        source: companies
    });

    var box_size = $('#company_search_box').innerWidth();
    $('#company').width(box_size-30);

    $( window ).resize(function() {
        var box_size = $('#company_search_box').innerWidth();
        $('#company').width(box_size-30);
    });

    $('[data-action="filters"]').click(function(){
        window.location.href=$(this).attr('href');
    })
})

