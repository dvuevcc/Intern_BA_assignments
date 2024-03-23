# Exercise 01

---

## Objective

Calculate the average values and analyze trends for various weather parameters over the full timespan covered in the provided weather data, dropping any NaN and other non-numeric values. Additionally, perform data analysis tasks using NumPy and create plots to visualize the trends over time.

---

## Data Description

The data file contains hourly weather observations with the following abbreviations and meanings:

| Abbreviation | Meaning                       |
| ------------ | ----------------------------- |
| TA           | Temperature Average           |
| RH           | Relative Humidity             |
| WS           | Wind Speed                    |
| WD           | Wind Direction                |
| PRA          | Precipitation Amount          |
| PRI          | Precipitation Intensity       |
| PA           | Pressure Average              |
| WAWA         | Most Significant Weather Code |

---

## Instructions

1. Open the provided CSV file named `[CSV_NAME]` containing the hourly weather observations.

2. Calculate the `average` values for the following parameters over the entire timespan covered in the data, disregarding any NaN and other non-numeric values:
   - Relative Humidity
   - Temperature Average
   - Wind Speed
   - Precipitation Amount
   - Pressure Average

3. Perform the following tasks using NumPy:
   - For each parameter, calculate the minimum, maximum, and median values.
   - Find the hour with the highest value for each parameter.

4. Create plots to visualize the trends of the following parameters over time:
   - Relative Humidity
   - Temperature Average
   - Wind Speed
   - Precipitation Amount
   - Pressure Average

5. Write the calculated average values for each parameter in the file `exrc-01-answer.txt`.

---

## Report

Please refer to the Jupyter notebook file `exrc-01-report.ipynb` for a detailed report on solving Exercise. The report includes:

- Code snippets used
- Links to external material referenced
- General thoughts about the process
- Specific strategies explored and any abandoned approaches

---

## Submission

After completing Exercise 01, please submit the following:

- The answer to Exercise 01 in the file `exrc-01-answer.txt`.
- The detailed report on solving Exercise 2 in the Jupyter notebook file `exrc-01-report.ipynb`.
- Upload the code to your personal GitHub repository and ensure the repository is public.

---

**Note:**

Make sure to replace `[CSV_NAME]` with the actual name of the CSV file containing the weather observations.
