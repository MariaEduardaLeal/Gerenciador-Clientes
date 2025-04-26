// Máscaras para formulários
function applyMasks() {
    // Máscara para CPF/CNPJ
    $('#cpf_cnpj').mask('000.000.000-00', {
      onKeyPress: function(cpf, e, field, options) {
        if (cpf.length > 14) {
          $(field).mask('00.000.000/0000-00');
        }
      }
    });

    // Validação de PNG
    $('input[name="photo"]').on('change', function(e) {
      const file = e.target.files[0];
      if (file && !file.name.toLowerCase().endsWith('.png')) {
        alert('Apenas arquivos PNG são permitidos!');
        $(this).val('');
      }
    });
  }

  // Inicialização quando o DOM estiver pronto
  $(document).ready(function() {
    applyMasks();

    // Tooltips
    $('[data-toggle="tooltip"]').tooltip();
  });
