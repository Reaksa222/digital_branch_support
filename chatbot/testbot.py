# import random
# import json
# import pickle
# import numpy as np
# import nltk
# from nltk.stem import WordNetLemmatizer
# from flask import Flask, render_template, request, jsonify
# from transformers import AutoModelForCausalLM, AutoTokenizer
# import torch
# import tensorflow as tf
# from tensorflow import keras

# # Create Flask app
# app = Flask(__name__)

# # Load DialoGPT model and tokenizer
# tokenizer = AutoTokenizer.from_pretrained("microsoft/DialoGPT-medium")
# model = AutoModelForCausalLM.from_pretrained("microsoft/DialoGPT-medium")

# # Load intents and preprocess data
# lemmatizer = WordNetLemmatizer()

# try:
#     with open('chatbot/database.json', 'r') as file:
#         intents = json.load(file)
# except FileNotFoundError as e:
#     print("Error: database.json file not found. Make sure the file is in the correct location.")
#     print(e)
#     exit()
# except json.JSONDecodeError as e:
#     print("Error: Failed to load data from database.json. Make sure it contains valid JSON.")
#     print(e)
#     exit()

# words = []
# classes = []
# documents = []
# ignore_letters = ['?', '!', '.', ',']

# # Process and lemmatize words
# for intent in intents['intents']:
#     for pattern in intent['patterns']:
#         word_list = nltk.word_tokenize(pattern)
#         words.extend(word_list)
#         documents.append((word_list, intent['tag']))
#         if intent['tag'] not in classes:
#             classes.append(intent['tag'])

# # Remove duplicates from words and sort
# words = [lemmatizer.lemmatize(word.lower()) for word in words if word not in ignore_letters]
# words = sorted(set(words))
# classes = sorted(set(classes))

# # Create a separate DialoGPT model and tokenizer with padding_side='left'
# dialogpt_tokenizer = AutoTokenizer.from_pretrained("microsoft/DialoGPT-medium", padding_side='left')
# dialogpt_model = AutoModelForCausalLM.from_pretrained("microsoft/DialoGPT-medium")

# # Save words and classes
# pickle.dump(words, open('chatbot/words.pkl', 'wb'))
# pickle.dump(classes, open('chatbot/classes.pkl', 'wb'))

# # Prepare training data
# training = []
# output_empty = [0] * len(classes)
# for document in documents:
#     bag = []
#     word_patterns = document[0]
#     word_patterns = [lemmatizer.lemmatize(word.lower()) for word in word_patterns]
#     for word in words:
#         bag.append(1) if word in word_patterns else bag.append(0)

#     output_row = list(output_empty)
#     output_row[classes.index(document[1])] = 1
#     training.append(bag + output_row)

# # Shuffle training data
# random.shuffle(training)
# training = np.array(training)

# train_x = training[:, :len(words)]
# train_y = training[:, len(words):]

# # Build a neural network model
# model = keras.Sequential()
# model.add(keras.layers.Dense(128, input_shape=(len(train_x[0]),), activation='relu'))
# model.add(keras.layers.Dropout(0.5))
# model.add(keras.layers.Dense(64, activation='relu'))
# model.add(keras.layers.Dropout(0.5))
# model.add(keras.layers.Dense(len(train_y[0]), activation='softmax'))

# # Compile the model
# sgd = tf.keras.optimizers.SGD(learning_rate=0.01, momentum=0.9, nesterov=True)
# model.compile(loss='categorical_crossentropy', optimizer=sgd, metrics=['accuracy'])

# # Train the model
# hist = model.fit(np.array(train_x), np.array(train_y), epochs=200, batch_size=5, verbose=1)

# # Save the trained model
# model.save('chatbot/chatbot_model.h5')

# @app.route("/")
# def index():
#     return render_template('chat.html')


# @app.route("/get", methods=["POST"])
# def chat():
#     msg = request.form["msg"]
#     response = get_chat_response(msg)
#     return jsonify({"response": response})

# def get_chat_response(text):
#     response = "Sorry, I'm not sure how to respond to that."

#     for intent in intents['intents']:
#         for pattern in intent['patterns']:
#             if pattern.lower() in text.lower():
#                 response = random.choice(intent['responses'])
#                 break
#     return response

# if __name__ == '__main__':
#     app.run()
