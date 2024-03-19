from PIL import Image
import os

input_directory = "image/product/sweet"
extensions = ["png", "jpg", "jpeg", "gif", "bmp"]

for filename in os.listdir(input_directory):
    if any(filename.lower().endswith(ext) for ext in extensions) and not filename.lower().endswith(".php"):
        input_path = os.path.join(input_directory, filename)
        img = Image.open(input_path)
        output_path = input_path.rsplit(".", 1)[0] + ".webp"  
        img.save(output_path, "webp")

files = os.listdir(input_directory)
for file in files:
    file_path = os.path.join(input_directory, file)
    
    if not file.lower().endswith(".webp") and not file.lower().endswith(".php")  and not file.lower().endswith(".css") and not file.lower().endswith(".js")  :
        os.remove(file_path)
        print(f"Fichier supprimé : {file_path}")

print("Conversion et suppression terminées.")