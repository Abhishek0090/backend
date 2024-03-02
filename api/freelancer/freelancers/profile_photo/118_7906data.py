import requests
from bs4 import BeautifulSoup
import pandas as pd
from io import StringIO

url_link = "https://www.teacheron.com/tutors-in-india"

results = requests.get(url_link).text

doc = BeautifulSoup(results, 'html.parser')

# print(doc.prettify())

res = doc.find(id = "tutorOrJobSearchItemList").get_text()
# print(res)
# print(type(res))

# StringData = StringIO(res)
# print(type(StringData))
# df = pd.read_csv(StringData, sep = "\n")

# df.to_csv("data.csv", index = False)
# print(df.head(100))

# testdf = pd.DataFrame(columns=["Name", "Word", "Tags", "Bio", "Location", "Rate", "Online Teaching", "Total Teaching"])
# print(testdf)

li = list(res.split("\n"))
li = list(filter(None, li))
while("" in li):
    li.remove("")

# for item in li:
#     print(item)

# print(li)

# for i in range(12):
#     print(i)

# declare final list and temp list
# loop over all elements in the list
    # loop 12 times
        # add current item in temp list
    # append temp list to final list
    # clear temp list
    
final_list = []
temp_list = []

# for item in li:
#     # for i in range(12):
#     #     temp_list.append(item)
#     # final_list.append(temp_list)
#     # temp_list.clear()
#     i = 0
#     while(i%12 > 0):
#         temp_list.append(item)
#         i += 1
#     final_list.append(temp_list)
#     temp_list.clear()

# print(final_list)

# for item in li:
#     if any(" km" in item for item in li):
#         li.remove(item)

i = 0
for item in li:
    item = item.strip()
    if item!="":
        temp_list.append(item)
    i = i+1
    if(i%10 == 0):
        final_list.append(temp_list)
        temp_list = []

# print(final_list[0])
# print("\n")
# print("--------------------------")
# print("\n")
# print(final_list[1])
# print("\n")
# print("--------------------------")
# print("\n")
# print(final_list[2])
# print("\n")
# print("--------------------------")
# print("\n")
# print(final_list[3])
# print("\n")
# print("--------------------------")
# print("\n")
# print(final_list[4])
# print("\n")
# print("--------------------------")
# print("\n")
# print(final_list[5])
# print("\n")
# print("--------------------------")
# print("\n")
# print(final_list[6])


data = doc.find_all("div", class_="highlightDivOnHover")

final_list = []
new_list = []
for item in data:
    # item.getelementbyclassname("lozad-custom-profile-img")
    img = item.find("img", {"class": "lozad-custom-profile-img"})
    # img[0].get("data-src")
    if img:
        # print(img["data-src"])
        img = img["data-src"]
    res = item.get_text()
    li = list(res.split("\n"))
    li = list(filter(None, li))
    while("" in li):
        li.remove("")    
    new_list.append(img)
    for i in li:
        i = i.strip()
        if i!="":
            new_list.append(i)
    if("km" not in new_list[-1]):
        new_list.append("Not present")
    final_list.append(new_list)
    new_list = []
    

for i in final_list:
    print(i)
    print("\n")
    print("--------------------------")
    print("\n")
