$(document).ready(function(){
  var table = $('#costTable').DataTable({
    "searching": false,
    "ordering": false,
    "paging": false,
    "bInfo": false
  });

  $.ajax({
    url: '/transaction/view-summaryOfCost',
    type: 'POST',
    data: {
      costing_id: $('#costingID').val()
    },
    success: function(costing) {
      // console.log(costing)
      $('#companyName').val(costing.strCompanyName)
      $('#partName').val(costing.strProductName)
      $('#spcGrav').val(costing.dblSpecificGravity)
      $('#surfArea').val(costing.dblSurfaceArea)
      $('#nonfilled').val(costing.dblWeightNonFilled)
      $('#filled').val(costing.dblWeightFilled)
      $('#soluble').val(costing.dblWeightSoluble)
      $('#reclaimed').val(costing.dblWeightReclaimed)
      $('#asmetal').val(costing.dblWeightAsMetal)
      $('#volume').val(costing.dblMainVolume)
      $('#rnnrtype').val(costing.dblRunnerType)
      $('#are').val(costing.dblArea)
      $('#vol').val(costing.dblSideVolume)
      $('#wght').val(costing.dblWeight)
      $('#sprue').val(costing.dblSprueType)
      $('#clusterarea').val(costing.dblClusterArea)
      $('#caswax').val(costing.dblClusterWeightAsWax)
      $('#casmetal').val(costing.dblClusterWeightAsMetal)
      $('#pcsperclster').val(costing.intPcsPerCluster)
      $('#atinjec').val(costing.dblEfficiencyAtInjection)
      $('#atassem').val(costing.dblEfficiencyAtAssembly)
      $('#atcoating').val(costing.dblEfficiencyAtCoating)
      $('#atcasting').val(costing.dblEfficiencyAtCasting)
    }
  });

  $.ajax({
    url: '/transaction/view-summaryMaterials',
    type: 'POST',
    data: {
      costing_id: $('#costingID').val()
    },
    success: function(costing) {
      for (var i = 0; i < costing.length; i++) {
        table.row.add([
          costing[i].strMaterialName,
          costing[i].strUOMID,
          costing[i].dblMatCost,
          costing[i].dblUsage,
          costing[i].dblFinalCost,
        ]).draw(true)
      }
    }
  });

});
