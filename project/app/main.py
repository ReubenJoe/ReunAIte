


# Import our libaries
from keras.models import Model, Sequential
from keras.layers import Input, Convolution2D, ZeroPadding2D, MaxPooling2D, Flatten, Dense, Dropout, Activation
from PIL import Image
import numpy as np
from keras.preprocessing.image import load_img, save_img, img_to_array
from keras.applications.imagenet_utils import preprocess_input
from keras.preprocessing import image
import matplotlib.pyplot as plt
import shutil
import os

model = Sequential()
model.add(ZeroPadding2D((1,1),input_shape=(224,224, 3)))
model.add(Convolution2D(64, (3, 3), activation='relu'))
model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(64, (3, 3), activation='relu'))
model.add(MaxPooling2D((2,2), strides=(2,2)))

model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(128, (3, 3), activation='relu'))
model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(128, (3, 3), activation='relu'))
model.add(MaxPooling2D((2,2), strides=(2,2)))

model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(256, (3, 3), activation='relu'))
model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(256, (3, 3), activation='relu'))
model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(256, (3, 3), activation='relu'))
model.add(MaxPooling2D((2,2), strides=(2,2)))

model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(512, (3, 3), activation='relu'))
model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(512, (3, 3), activation='relu'))
model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(512, (3, 3), activation='relu'))
model.add(MaxPooling2D((2,2), strides=(2,2)))

model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(512, (3, 3), activation='relu'))
model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(512, (3, 3), activation='relu'))
model.add(ZeroPadding2D((1,1)))
model.add(Convolution2D(512, (3, 3), activation='relu'))
model.add(MaxPooling2D((2,2), strides=(2,2)))

model.add(Convolution2D(4096, (7, 7), activation='relu'))
model.add(Dropout(0.5))
model.add(Convolution2D(4096, (1, 1), activation='relu'))
model.add(Dropout(0.5))
model.add(Convolution2D(2622, (1, 1)))
model.add(Flatten())
model.add(Activation('softmax'))


from keras.models import model_from_json
model.load_weights(r'C:\xampp\htdocs\Projects\AI\vgg_face_weights.h5')

def preprocess_image(image_path):
    img = load_img(image_path, target_size=(224, 224))
    img = img_to_array(img)
    img = np.expand_dims(img, axis=0)
    img = preprocess_input(img)
    return img

def findCosineSimilarity(source_representation, test_representation):
    a = np.matmul(np.transpose(source_representation), test_representation)
    b = np.sum(np.multiply(source_representation, source_representation))
    c = np.sum(np.multiply(test_representation, test_representation))
    return 1 - (a / (np.sqrt(b) * np.sqrt(c)))


vgg_face_descriptor = Model(inputs=model.layers[0].input, outputs=model.layers[-2].output)

epsilon = 0.35
img_arr=[]
def verifyFace(img1, img2):
    img_store=[]
    img1_representation = vgg_face_descriptor.predict(preprocess_image(r"C:\xampp\htdocs\Projects\AI\training_faces\\"+img1))[0,:]
    img2_representation = vgg_face_descriptor.predict(preprocess_image(r"C:\xampp\htdocs\Projects\AI\missing images\\"+img2))[0,:]
    
    cosine_similarity = findCosineSimilarity(img1_representation, img2_representation)
    
    # f = plt.figure()
    # f.add_subplot(1,2, 1)
    # plt.imshow(image.load_img('./training_faces/%s' % (img1)))
    # plt.xticks([]); plt.yticks([])
    # f.add_subplot(1,2, 2)
    # plt.imshow(image.load_img('./missing images/%s' % (img2)))
    # plt.xticks([]); plt.yticks([])
    # plt.show(block=True)
    
    print("Cosine similarity: ",cosine_similarity)
    
    if(cosine_similarity < epsilon):
        print("They are same person")
        img_arr.append(img1)
        for img in img_arr:
            source=r"C:\xampp\htdocs\Projects\AI\training_faces\\"+img
            destination = r"C:\xampp\htdocs\Projects\AI\result"
            dest = shutil.copy(source, destination)
    else:
        print("They are not same person!")




def fn():       # 1.Get file names from directory
    file_list=os.listdir(r"C:\xampp\htdocs\Projects\AI\training_faces")
    img_miss=os.listdir(r"C:\xampp\htdocs\Projects\AI\missing images")
    for img in file_list:
        verifyFace(img, img_miss[0])

 #2.To rename files
fn()