<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Evaluation Sheet Tester</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4">Pang Testing</h2>

  <form id="evaluationForm" action="{{ route('evaluate') }}" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4">
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" name="TITLE" class="form-control" value="EVALUATION SHEET  V1.0.2">
        </div>
        <div class="mb-3">
          <label class="form-label">Program</label>
          <input type="text" name="PROGRAM" class="form-control" value="DCS">
        </div>
        <div class="mb-3">
          <label class="form-label">LTS Date</label>
          <input type="date" name="LTS_DATE" class="form-control" value="">
        </div>
        <div class="mb-3">
          <label class="form-label">Pay Mode</label>
          <input type="text" name="PAY_MODE" class="form-control" value="Over-the-counter">
        </div>
        <div class="mb-3">
          <label class="form-label">Guideline</label>
          <input type="text" name="GUIDELINE" class="form-control" value="396/349">
        </div>
        <div class="mb-3">
          <label class="form-label">Work Area</label>
          <input type="text" name="WORK_AREA" class="form-control" value="REGION">
        </div>
        <div class="mb-3">
          <label class="form-label">Type of Development</label>
          <input type="text" name="TYPE_OF_DEVELOPMENT" class="form-control" value="BP 220">
        </div>
        <div class="mb-3">
          <label class="form-label">Total Floor Number</label>
          <input type="number" name="TOTAL_FLOOR_NUMBER" class="form-control" value="2">
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3">
          <label class="form-label">Birth Date (Principal)</label>
          <input type="date" name="BIRTH_DATE" class="form-control" value="2003-07-22">
        </div>
        <div class="mb-3">
          <label class="form-label">Employment</label>
          <input type="text" name="EMPLOYMENT" class="form-control" value="PRIVATE">
        </div>
        <div class="mb-3">
          <label class="form-label">LTS Number</label>
          <input type="text" name="LTS_NUMBER" class="form-control" value="">
        </div>
        <div class="mb-3">
          <label class="form-label">Principal Borrower</label>
          <input type="text" name="PRINCIPAL_BORROWER" class="form-control" value="JOHN LLOYD VIRAY ALLERA">
        </div>
        <div class="mb-3">
          <label class="form-label">Co-Borrower 1</label>
          <input type="text" name="COBORROWER_1" class="form-control" value="ANGELA MARIE FRAGIO FRANADA">
        </div>
        <div class="mb-3">
          <label class="form-label">Co-Borrower 2</label>
          <input type="text" name="COBORROWER_2" class="form-control" value="COBORROWER2">
        </div>
        <div class="mb-3">
          <label class="form-label">Birth Date (Co-Borrower 1)</label>
          <input type="date" name="BIRTH_DATE_COBORROWER_1" class="form-control" value="2006-12-24">
        </div>
        <div class="mb-3">
          <label class="form-label">Birth Date (Co-Borrower 2)</label>
          <input type="date" name="BIRTH_DATE_COBORROWER_2" class="form-control" value="2003-07-22">
        </div>
        <div class="mb-3">
          <label class="form-label">Gross Income (Principal)</label>
          <input type="number" name="GROSS_INCOME_PRINCIPAL" class="form-control" value="27000">
        </div>
        <div class="mb-3">
          <label class="form-label">Gross Income (Co-Borrower 1)</label>
          <input type="number" name="GROSS_INCOME_COBORROWER_1" class="form-control" value="16000">
        </div>
        <div class="mb-3">
          <label class="form-label">Gross Income (Co-Borrower 2)</label>
          <input type="number" name="GROSS_INCOME_COBORROWER_2" class="form-control" value="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3">
          <label class="form-label">Price Ceiling</label>
          <input type="number" name="PRICE_CEILING" class="form-control" value="750000">
        </div>
        <div class="mb-3">
          <label class="form-label">Selling Price</label>
          <input type="number" name="SELLING_PRICE" class="form-control" value="1750000">
        </div>
        <div class="mb-3">
          <label class="form-label">Application Date</label>
          <input type="date" name="APPLICATION_DATE" class="form-control" value="2025-04-15">
        </div>
        <div class="mb-3">
          <label class="form-label">Repricing Period</label>
          <input type="text" name="REPRICING_PERIOD" class="form-control" value="3 yrs">
        </div>
        <div class="mb-3">
          <label class="form-label">Total Floor Area</label>
          <input type="number" name="TOTAL_FLOOR_AREA" step="0.1" class="form-control" value="45.5">
        </div>
        <div class="mb-3">
          <label class="form-label">Loan Period (Years)</label>
          <input type="number" name="LOAN_PERIOD_YEARS" class="form-control" value="30">
        </div>
        <div class="mb-3">
          <label class="form-label">Appraised Value (Lot)</label>
          <input type="number" name="APPRAISED_VALUE_LOT" class="form-control" value="286200">
        </div>
        <div class="mb-3">
          <label class="form-label">Appraised Value (House)</label>
          <input type="number" name="APPRAISED_VALUE_HOUSE" class="form-control" value="1551400">
        </div>
        <div class="mb-3">
          <label class="form-label">Desired Loan</label>
          <input type="number" name="DESIRED_LOAN" class="form-control" value="1750000">
        </div>
        <div class="mb-3">
          <label class="form-label">Housing Type</label>
          <input type="text" name="HOUSING_TYPE" class="form-control" value="DUPLEX">
        </div>
        <div class="mb-3">
          <label class="form-label">Project Type</label>
          <input type="text" name="PROJECT_TYPE" class="form-control" value="SOCIALIZED">
        </div>
      </div>
      <div class="col-md-12">
        <div class="mb-3">
          <label class="form-label">Borrower Existing Loan</label>
          <input type="text" name="BORROWER_EXISTING_LOAN" class="form-control" value="">
        </div>
        <div class="mb-3">
          <label class="form-label">Borrower Existing Loan MA</label>
          <input type="text" name="BORROWER_EXISTING_LOAN_MA" class="form-control" value="">
        </div>
        <div class="mb-3">
          <label class="form-label">Co-Borrower 1 Existing Loan</label>
          <input type="text" name="COBORROWER1_EXISTING_LOAN" class="form-control" value="">
        </div>
        <div class="mb-3">
          <label class="form-label">Co-Borrower 1 Existing Loan MA</label>
          <input type="text" name="COBORROWER1_EXISTING_LOAN_MA" class="form-control" value="">
        </div>
        <div class="mb-3">
          <label class="form-label">Co-Borrower 2 Existing Loan</label>
          <input type="text" name="COBORROWER2_EXISTING_LOAN" class="form-control" value="">
        </div>
        <div class="mb-3">
          <label class="form-label">Co-Borrower 2 Existing Loan MA</label>
          <input type="text" name="COBORROWER2_EXISTING_LOAN_MA" class="form-control" value="">
        </div>
        <div class="mb-3">
          <label class="form-label">Upload Excel File</label>
          <input type="file" name="excel_file" class="form-control" required>
        </div>
      </div>
    </div>
    <div class="form-check mb-4">
  <input class="form-check-input" type="checkbox" id="valueOnlyCheckbox">
  <label class="form-check-label" for="valueOnlyCheckbox">
    Value Only?
  </label>
</div>
<div class="text-center mt-4">
  <button id="submitBtn" class="btn btn-success" type="submit">
    <span id="submitText">Submit Evaluation</span>
    <span id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
  </button>
</div>
  </form>

  <div id="responseContainer" class="mt-4"></div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('evaluationForm');
  const submitBtn = document.getElementById('submitBtn');
  const submitText = document.getElementById('submitText');
  const submitSpinner = document.getElementById('submitSpinner');

  
//   const form = document.getElementById('evaluationForm');
  const valueOnlyCheckbox = document.getElementById('valueOnlyCheckbox');

  if (!form) return;
  form.addEventListener('submit', async function(e) {
    e.preventDefault();
    submitBtn.disabled = true;
    submitSpinner.classList.remove('d-none');
    submitText.textContent = 'Evaluating...maghintay';
    // Base route without parameters
    let baseAction = "{{ route('evaluate') }}";
    // Append ?valueOnly=true if checkbox is checked
    if (valueOnlyCheckbox.checked) {
      baseAction += '?valueOnly=true';
    }

    const formData = new FormData(form);

    try {
      const response = await fetch(baseAction, {
        method: 'POST',
        body: formData,
        headers: {
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        },
      });
      const result = await response.json();
      document.getElementById('responseContainer').innerHTML = `
        <pre class="alert alert-info">${JSON.stringify(result, null, 2)}</pre>
      `;
    } catch (error) {
      document.getElementById('responseContainer').innerHTML = `
        <div class="alert alert-danger">Error: ${error.message}</div>
      `;
    }
    finally {
      submitBtn.disabled = false;
      submitSpinner.classList.add('d-none');
      submitText.textContent = 'Submit Evaluation';
    }
  });
});
</script>

</body>
</html>


