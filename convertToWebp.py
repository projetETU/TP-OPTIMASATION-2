from PIL import Image
import os

def resize_image(input_image_path, output_image_path, size):
    with Image.open(input_image_path) as img:
        img = img.resize(size, Image.ANTIALIAS)
        img.save(output_image_path, "webp")

input_directory = "image/"

for filename in os.listdir(input_directory):
    if any(filename.lower().endswith(ext) for ext in extensions) and not filename.lower().endswith(".php"):
        input_path = os.path.join(input_directory, filename)
        output_path = input_path.rsplit(".", 1)[0] + ".webp"
        resize_image(input_path, output_path, output_size)

files = os.listdir(input_directory)
for file in files:
    file_path = os.path.join(input_directory, file)
    
    if not file.lower().endswith(".webp") and not file.lower().endswith(".php"):
        os.remove(file_path)
        print(f"Fichier supprimé : {file_path}")

print("Conversion et suppression terminées.")
