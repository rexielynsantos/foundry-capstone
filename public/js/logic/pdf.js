function htmltopdf() {

              var frame1 = $('<iframe />');
              frame1[0].name = "frame1";
              frame1.css({ "position": "absolute", "top": "-1000000px" });
              $("body").append(frame1);
              var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
              frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head>');
                frameDoc.document.write('</head><body>');
                
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                    // alert(" processed!");
                    // window.location.href = "transaction";

                }, 500);

            }
