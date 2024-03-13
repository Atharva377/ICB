
const username = document.getElementById("username").textContent;
const joining = document.getElementById("joining").textContent;
const letterType = document.getElementById("letter_type").textContent;
const empPosition = document.getElementById("emp_position").textContent;
const workingType = document.getElementById("workingType").textContent;
const duration = document.getElementById("duration").textContent;
const salary_amount = document.getElementById("salary_amount").textContent;
const salaryType = document.getElementById("salary_type").textContent;
const specialAddition = document.getElementById("special_addition").textContent;
const primaryResponsibilities = document.getElementById("primary_responsibilities").textContent;

const { PDFDocument, rgb, degrees } = PDFLib;


const generatePDF = async () => {
  let pdfFileName = '';
  if (letterType.trim() === "Mandet" && workingType.trim()==="Internship") {
    pdfFileName = "../database/MI_Internship_Offer_Letter.pdf";
}  else if(letterType.trim() === "Mandet" && workingType.trim()==="Job"){
  
  pdfFileName = "../database/MI_Job_Offer_Letter.pdf";
}
else if(letterType.trim() === "Tax Sarthi" && workingType.trim()==="Job"){
  pdfFileName = "../database/TS_Job_Offer_Letter.pdf";
}
else{
  pdfFileName = "../database/TS_Internship_Offer_Letter.pdf";
}

const existingPdfBytes = await fetch(pdfFileName).then((res) =>
    res.arrayBuffer()
);
  
  const pdfDoc = await PDFDocument.load(existingPdfBytes);
  pdfDoc.registerFontkit(fontkit);

  
  const fontBytes = await fetch("../AdditionalFonts/Inter-Medium.ttf").then((res) =>
    res.arrayBuffer()
  );
  const fontBytes1 = await fetch("../AdditionalFonts/Inter-SemiBold.ttf").then((res) =>
    res.arrayBuffer()
  );
  const fontBytes2 = await fetch("../AdditionalFonts/Inter-Bold.ttf").then((res) =>
    res.arrayBuffer()
  );
  const fontBytes3 = await fetch("../AdditionalFonts/Inter-Regular.ttf").then((res) =>
    res.arrayBuffer()
  );
  

  
  const InterMedFont = await pdfDoc.embedFont(fontBytes);
  const InterSemiBoldFont = await pdfDoc.embedFont(fontBytes1);
  const InterBoldFont = await pdfDoc.embedFont(fontBytes2); 
  const InterRegular = await pdfDoc.embedFont(fontBytes3); 
   
  
 
  
  const pages = pdfDoc.getPages();
  const firstPage = pages[0];

  
  if (letterType.trim() === "Mandet") {
    firstPage.drawText(username, {
      x: 62,
      y: 668.2,
      size: 12.1,
      font: InterSemiBoldFont,
      color: rgb(0.0, 0.0, 0.0),
  });
  firstPage.drawText(joining, {
      x: 130,
      y: 505.6,
      size: 12,
      font: InterRegular,
      color: rgb(0.0, 0.0, 0.0),
  });
  
  firstPage.drawText(empPosition, {
    x: 105.1,
    y: 537.6,
    size: 12,
    font:InterRegular,
     color: rgb(0.0, 0.0, 0.0),
  });
  firstPage.drawText(duration, {
        x: 108,
        y: 521.6,
        size: 12,
        font:  InterRegular,
         color: rgb(0.0, 0.0, 0.0),
      });
  firstPage.drawText(salary_amount, {
    x: 110,
    y: 489.6,
    size: 12,
    font: InterRegular,
     color: rgb(0.0, 0.0, 0.0),
  });
  firstPage.drawText(salaryType, {
    x: 150,
    y: 489.6,
    size: 12,
    font: InterRegular,
     color: rgb(0.0, 0.0, 0.0),
  });
  firstPage.drawText(specialAddition, {
    x: 157,
    y: 473.6,
    size: 12,
    font: InterSemiBoldFont,
     color: rgb(0.0, 0.0, 0.0),
  });
  firstPage.drawText(primaryResponsibilities, {
    x: 31,
    y: 362.8,
    size: 12,
    font: InterSemiBoldFont,
     color: rgb(0.0, 0.0, 0.0),
  });
  
} else {
  firstPage.drawText(username, {
    x: 61.4,
    y: 669,
    size: 12.1,
    font: InterSemiBoldFont,
    color: rgb(0.0, 0.0, 0.0),
});
firstPage.drawText(joining, {
    x: 129,
    y: 490,
    size: 12,
    font: InterRegular,
    color: rgb(0.0, 0.0, 0.0),
});

firstPage.drawText(empPosition, {
  x: 105.1,
  y: 522,
  size: 12,
  font:InterRegular,
   color: rgb(0.0, 0.0, 0.0),
});
firstPage.drawText(duration, {
      x: 107,
      y: 506.4,
      size: 12,
      font:  InterRegular,
       color: rgb(0.0, 0.0, 0.0),
    });
firstPage.drawText(salary_amount, {
  x: 110,
  y: 473,
  size: 12,
  font: InterRegular,
   color: rgb(0.0, 0.0, 0.0),
});
firstPage.drawText(salaryType, {
  x: 150,
  y: 473,
  size: 12,
  font: InterRegular,
   color: rgb(0.0, 0.0, 0.0),
});
firstPage.drawText(specialAddition, {
  x: 155.98,
  y: 457,
  size: 12,
  font: InterSemiBoldFont,
   color: rgb(0.0, 0.0, 0.0),
});
firstPage.drawText(primaryResponsibilities, {
  x: 31,
  y: 344,
  size: 12,
  font: InterSemiBoldFont,
   color: rgb(0.0, 0.0, 0.0),
});

}


  const pdfBytes = await pdfDoc.save();
  console.log("Done creating");

 
  let filename;
if (letterType.trim() === "Mandet") {
    filename = workingType.trim() === "Internship" ? "Mandet India Internship Offer Letter.pdf" : "Mandet India Job Offer Letter.pdf";
} else {
    filename = workingType.trim() === "Internship" ? "Tax Sarthi Internship Offer Letter.pdf" : "Tax Sarthi Job Offer Letter.pdf";
}

var file = new File(
    [pdfBytes],
    filename,
    {
        type: "application/pdf;charset=utf-8",
    }
);
 saveAs(file);
};
generatePDF();
