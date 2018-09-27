if (typeof jQuery === 'undefined') {
  throw new Error('jQuery plugins need to be before this file');
}

$(function() {
  $.getJSON('/audit/api/graficos.php', function(data) {
    var graficoUsuariosDados = [];
    var graficoMasternodesAtivosDados = [];
    var graficoMasternodesCaptacaoDados = [];
    $.each(data, function(k, v) {
      var t = v.epoch;
      graficoUsuariosDados.push([t, v.totalUsuarios]);
      graficoMasternodesAtivosDados.push([t, v.totalMasternodesAtivos]);
      graficoMasternodesCaptacaoDados.push([t, v.totalMasternodesCaptacao]);
    });

    if ($('#grafico_usuarios').length) {
      $.plot('#grafico_usuarios', [{ data: graficoUsuariosDados, label: 'Usuários', color: '#E91E63' }], {
        series: {
          lines: {
            show: true,
            fill: false
          },
          points: {
            radius: 2,
            fill: true,
            show: true
          }
        },
        xaxis: {
          mode: 'time',
          minTickSize: [1, 'day'],
          timeformat: '%d/%m/%Y'
        },
        yaxes: [
          {
            min: 0,
            tickFormatter: function(v, axis) {
              return v.toFixed(0);
            }
          },
          {
            alignTicksWithAxis: 1,
            position: 'right'
          }
        ],
        grid: {
          hoverable: true,
          autoHighlight: false,
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        legend: { position: 'sw' }
      });

      $("<div id='tooltip_grafico_usuarios'></div>")
        .css({
          position: 'absolute',
          display: 'none',
          border: '1px solid #fdd',
          padding: '2px',
          'background-color': '#fee',
          opacity: 0.8
        })
        .appendTo('body');

      $('#grafico_usuarios').bind('plothover', function(event, pos, item) {
        if (item) {
          var x = item.datapoint[0].toFixed(0),
            y = item.datapoint[1].toFixed(0);

          $('#tooltip_grafico_usuarios')
            .html(item.series.label + ': ' + y)
            .css({ top: item.pageY + 5, left: item.pageX + 5 })
            .fadeIn(200);
        } else {
          $('#tooltip_grafico_usuarios').hide();
        }
      });
    }

    if ($('#grafico_masternodes_ativos').length) {
      $.plot('#grafico_masternodes_ativos', [{ data: graficoMasternodesAtivosDados, label: 'Masternodes ativos', color: '#001E63' }], {
        series: {
          lines: {
            show: true,
            fill: false
          },
          points: {
            radius: 2,
            fill: true,
            show: true
          }
        },
        xaxis: {
          mode: 'time',
          minTickSize: [1, 'day'],
          timeformat: '%d/%m/%Y'
        },
        yaxes: [
          {
            min: 0,
            tickFormatter: function(v, axis) {
              return v.toFixed(0);
            }
          },
          {
            alignTicksWithAxis: 1,
            position: 'right'
          }
        ],
        grid: {
          hoverable: true,
          autoHighlight: false,
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        legend: { position: 'sw' }
      });

      $("<div id='tooltip_grafico_masternodes_ativos'></div>")
        .css({
          position: 'absolute',
          display: 'none',
          border: '1px solid #fdd',
          padding: '2px',
          'background-color': '#fee',
          opacity: 0.8
        })
        .appendTo('body');

      $('#grafico_masternodes_ativos').bind('plothover', function(event, pos, item) {
        if (item) {
          var x = item.datapoint[0].toFixed(0),
            y = item.datapoint[1].toFixed(0);

          $('#tooltip_grafico_masternodes_ativos')
            .html(item.series.label + ': ' + y)
            .css({ top: item.pageY + 5, left: item.pageX + 5 })
            .fadeIn(200);
        } else {
          $('#tooltip_grafico_masternodes_ativos').hide();
        }
      });
    }
  });
});
