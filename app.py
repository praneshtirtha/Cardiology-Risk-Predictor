from flask import Flask, render_template, request, jsonify
import joblib
import numpy as np # type: ignore

# Initialize the Flask app
app = Flask(__name__)

# Load the trained model
model = joblib.load('best_rf_model.pkl')

# Define the route for the home page
@app.route('/')
def home():
    return render_template('index.html')

# Define the route for prediction
@app.route('/predict', methods=['POST'])
def predict():
    # Get data from the form
    data = [float(request.form.get(feature)) for feature in ['age', 'gender', 'height', 'weight', 'ap_hi', 'ap_lo', 'cholesterol', 'gluc', 'smoke', 'alco', 'active']] # Replace with your actual feature names

    # Convert data into numpy array and reshape
    data_array = np.array(data).reshape(1, -1)

    # Make prediction
    prediction = model.predict(data_array)
    result = 'Yes' if prediction[0] == 1 else 'No'

    return render_template('index.html', prediction_text=f'Predicted Result: {result}')

if __name__ == '__main__':
    app.run(debug=True)
    
