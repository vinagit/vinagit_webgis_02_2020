var map;
var basemap;
var ThuadatWMS;
var datatable=[];
var Table;
var LayerSelect;
//khai báo map
map = L.map('map').setView([10.868090, 106.920637], 13);
// Khai báo basemap
basemap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 17,
    minZoom: 0
});
// Add basemap vào map
map.addLayer(basemap);
//Lấy dữ liệu WMS thửa đất từ geoserver
ThuadatWMS = L.tileLayer.wms('http://localhost:8080/geoserver/thuadat/wms', {
    layers: 'thuadat:thuadat',
    transparent: true,
    format: 'image/png'
});
// Add layer thửa đất vào map
map.addLayer(ThuadatWMS)

// Add data geojson
$.ajax({
    url: "proxy.php?url=" + encodeURIComponent("http://localhost:8080/geoserver/thuadat/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=thuadat%3Athuadat&maxFeatures=20000&outputFormat=application%2Fjson"), // URL cần lấy dữ liệu 
    type: "get", // chọn phương thức gửi là get
    dateType: "json", // dữ liệu trả về dạng json
    success: function (result) {
        // goi function de ve du lieu geojson tra ve
        drawgeojson(result);
    }
});

// Function draw geojson
function drawgeojson(data) {
    var Features = JSON.parse(data).features;
    for (var i = 0; i < Features.length; i++) {
        var geojson = Features[i];
    
        var myLayer = L.geoJSON(geojson, {
            style: {
                color: 'transparent'
            }
        }).on('click', function (Layer) {
            datatable = [];
            var properties = Layer.propagatedFrom.feature.properties;
            var data = [properties.diachi,properties.dientich,properties.sohieuto,properties.sohieuthua,properties.loaidat,properties.loaidat]
            datatable.push(data);

            WriteTable(datatable);
            
        }).addTo(map);
    }
}

function  WriteTable(datatable){
    Table =  $('#datatable').DataTable( {
        data: datatable,
        "destroy": true,
        "sScrollY" : "350",
        "columnDefs": [
            {
                "targets": [ 5 ],
                "visible": false
            }
        ],
        columns: [
            { title: "Địa chỉ" },
            { title: "Diện tích" },
            { title: "Số hiệu tờ" },
            { title: "Số hiệu thửa" },
            { title: "Loại đất" },
            { title: "geom" }                       
        ]
    });
    //Lấy giá trị khi click vào bảng
    $('#datatable tbody').on( 'click', 'tr', function () {
        // css cho dòng được chọn
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            Table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        // Xóa đối tượng select trước đó
        if(LayerSelect !== undefined){
            map.removeLayer(LayerSelect);
        }
        //lay du lieu cua hang
        var dataselected = Table.row(this).data();
        console.log(dataselected);
        var geojsonSelected = JSON.parse(dataselected[5]);
        LayerSelect = L.geoJSON(geojsonSelected,{
            style:{
                color:'red'
            }
        }).addTo(map);
        var bound = LayerSelect.getBounds();
        map.fitBounds(bound);
    });
}

function Search() {
    var soto = document.getElementById('soto').value;
    var sothua = document.getElementById('sothua').value;
    
    $.ajax({
        url :"backend/xulyjson.php?soto="+soto+"&sothua="+sothua, 
        type : "get", // chọn phương thức gửi là get
        dateType:"json", // dữ liệu trả về dạng text
        success : function (result){
            var kq = JSON.parse(result);
            datatable = [];
            if(kq.length === 0){
                //show thông báo
                $('#myModal').modal('show');
                // ẩn modal
                /* $('#myModal').modal('hide'); */
            }
            else{
                // Chuyển kiểu object qua array
                var arrkq = Object.keys(kq).map(function(key) {
                    return kq[key];
                });

                for(var i = 0; i < arrkq.length; i++){
                    var data = [arrkq[i].diachi,arrkq[i].dientich,arrkq[i].sohieuto,arrkq[i].sohieuthua,arrkq[i].loaidat,arrkq[i].geom]
                    datatable.push(data);
                } 
                WriteTable(datatable);
            }
            
        }
    });
    
}