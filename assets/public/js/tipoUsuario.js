function selecionarTipo(tipo) {
    const camposAdicionais = document.getElementById('camposAdicionais');
    const camposFisica = document.getElementById('camposFisica');
    const camposJuridica = document.getElementById('camposJuridica');


    camposAdicionais.style.display = 'block';
    camposFisica.style.display = 'none';
    camposJuridica.style.display = 'none';

    if (tipo === 'fisica') {
        camposFisica.style.display = 'block';
        document.getElementById('btnFisica').classList.add('btn-primary');
        document.getElementById('btnFisica').classList.remove('btn-outline-secondary');
        document.getElementById('btnJuridica').classList.remove('btn-primary');
        document.getElementById('btnJuridica').classList.add('btn-outline-secondary');
    } else if (tipo === 'juridica') {
        camposJuridica.style.display = 'block';
        document.getElementById('btnJuridica').classList.add('btn-primary');
        document.getElementById('btnJuridica').classList.remove('btn-outline-secondary');
        document.getElementById('btnFisica').classList.remove('btn-primary');
        document.getElementById('btnFisica').classList.add('btn-outline-secondary');
    }
}
document.addEventListener('DOMContentLoaded', () => {
    selecionarTipo('fisica');
});
