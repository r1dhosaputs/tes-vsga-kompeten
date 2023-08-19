// Function nge handle Print button
const printBtn = document.getElementById("print-btn");
printBtn.addEventListener("click", function () {
  window.print();
});

// Function nge handle Save as PDF button
const pdfBtn = document.getElementById("pdf-btn");
pdfBtn.addEventListener("click", function () {
  const hidePdf = document.querySelector("#hide-pdf");
  hidePdf.style.display = "none";
  const elementPrint = document.querySelector("#print-area");
  html2pdf()
    .from(elementPrint)
    .set({
      margin: 10,
      filename: "siswa-mendaftar.pdf",
      image: { type: "jpeg", quality: 0.98 },
      jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
    })
    .outputPdf()
    .then((pdf) => {
      // Setelah proses HTML2PDF selesai, lakukan reload halaman
      location.reload(true);
    })
    .save();
});
