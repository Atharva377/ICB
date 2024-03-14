const userName = document.getElementById("emp_name").textContent.toUpperCase();
const month = document.getElementById("pay_month").textContent;
const year = document.getElementById("pay_year").textContent;
const userDesignation = document.getElementById("emp_designation").textContent;
const UserID = document.getElementById("emp_id").textContent;
const userPAN = document.getElementById("emp_pan").textContent.toUpperCase();
const userDaysPresent = document.getElementById("emp_days_present").textContent;
const userLOP = document.getElementById("emp_lop").textContent;
const uan = document.getElementById("emp_uan").textContent;
const pfNo = document.getElementById("emp_pfno").textContent;
const tan = document.getElementById("comp_tan").textContent;
const userBank = document.getElementById("emp_account").textContent;
const userIFSC = document.getElementById("emp_ifsc").textContent.toUpperCase();
const userBasicSalary = document.getElementById("emp_basic_pay").textContent;
const userTA = document.getElementById("emp_travelAll").textContent;
const userOA = document.getElementById("emp_otherAll").textContent;
const userBonus = document.getElementById("emp_bonus").textContent;
const userPT = document.getElementById("emp_pt").textContent;
const userPF = document.getElementById("emp_pf").textContent;
const userInsurance = document.getElementById("emp_insurance").textContent;
const userTDS = document.getElementById("emp_tds").textContent;
const other = document.getElementById("emp_other").textContent;
const netPayable = document.getElementById("emp_net_payable").textContent;
const netPayableWords = document.getElementById("emp_net_payable_word").innerText;
console.log(netPayableWords);
const { PDFDocument, rgb, degrees } = PDFLib;

// const capitalize = (str, lower = false) =>
//   (lower ? str.toLowerCase() : str).replace(/(?:^|\s|["'([{])+\S/g, (match) =>
//     match.toUpperCase()
//   );

// submitBtn.addEventListener("click", () => {
//   const val = capitalize(userName.value);

//   check if the text is empty or not
//   if (val.trim() !== "" && userName.checkValidity()) {
//     console.log(val);
//     generatePDF(val);
//   } else {
//     userName.reportValidity();
//   }
// });

const generatePDF = async () => {
  const existingPdfBytes = await fetch("../database/paySlip.pdf").then((res) =>
    res.arrayBuffer()
  );

  // Load a PDFDocument from the existing PDF bytes
  const pdfDoc = await PDFDocument.load(existingPdfBytes);
  pdfDoc.registerFontkit(fontkit);

  //get font
  const fontBytes = await fetch("../AdditionalFonts/Inter-Medium.ttf").then((res) =>
    res.arrayBuffer()
  );
  const fontBytes1 = await fetch("../AdditionalFonts/Inter-SemiBold.ttf").then((res) =>
    res.arrayBuffer()
  );
  const fontBytes2 = await fetch("../AdditionalFonts/Inter-Bold.ttf").then((res) =>
    res.arrayBuffer()
  );

  // Embed our custom font in the document
  const InterMedFont = await pdfDoc.embedFont(fontBytes);
  const InterSemiBoldFont = await pdfDoc.embedFont(fontBytes1);
  const InterBoldFont = await pdfDoc.embedFont(fontBytes2);

  // Get the first page of the document
  const pages = pdfDoc.getPages();
  const firstPage = pages[0];

//   Draw a string of text diagonally across the first page
  firstPage.drawText(userName, {
    x: 135,
    y: 640.5,
    size: 12,
    font: InterSemiBoldFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(month, {
    x: 187,
    y: 700,
    size: 15,
    font: InterBoldFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(year, {
    x: 187,
    y: 685,
    size: 15,
    font: InterBoldFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userDesignation, {
    x: 142,
    y: 592,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(uan, {
    x: 375,
    y: 592,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(UserID, {
    x: 142,
    y: 568,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(pfNo, {
    x: 375,
    y: 568,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userPAN, {
    x: 142,
    y: 544,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(tan, {
    x: 375,
    y: 544,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userDaysPresent, {
    x: 142,
    y: 520,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userBank, {
    x: 375,
    y: 520,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userLOP, {
    x: 142,
    y: 496,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userIFSC, {
    x: 375,
    y: 496,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userBasicSalary, {
    x: 142,
    y: 427,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userPT, {
    x: 375,
    y: 427,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userTA, {
    x: 142,
    y: 403,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userPF, {
    x: 375,
    y: 403,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userOA, {
    x: 142,
    y: 380,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userInsurance, {
    x: 375,
    y: 380,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userBonus, {
    x: 142,
    y: 356,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(userTDS, {
    x: 375,
    y: 356,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(netPayable, {
    x: 142,
    y: 310,
    size: 12,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });
  firstPage.drawText(netPayableWords, {
    x: 142,
    y: 287,
    size: 11,
    font: InterMedFont,
    color: rgb(0, 0, 0),
  });

  // Serialize the PDFDocument to bytes (a Uint8Array)
  const pdfBytes = await pdfDoc.save();
  console.log("Done creating");

  // this was for creating uri and showing in iframe

//   const pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
//   window.open(pdfDataUri);
//   document.querySelector("#mypdf").src = pdfDataUri;

  var file = new File(
    [pdfBytes],
    "Pay Slip "+month+" "+year+" | "+userName+".pdf",
    {
      type: "application/pdf;charset=utf-8",
    }
  );
 saveAs(file);
};

// init();
generatePDF();