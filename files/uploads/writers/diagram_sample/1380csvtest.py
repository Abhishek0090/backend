import csv

# csv.writer(csvfile, dialect=excel, **fmtparams)

with open('freelancerstest.csv', 'w', newline='', encoding="utf-8") as file:
    writer = csv.writer(file)

    writer.writerow(["Image", "Name", "Short Bio", "Subject Tags", "Long Bio", "Location", "Rate", "Online Teaching", "Total Teaching", "Location"])
    writer.writerow([None, 'Kulvinder Singh', 'Maths, basic- advance excel, ms word, ms PowerPoi', 'Math (ICSE)', 'I am a professional maths teacher and I have 3yr of teaching experience. I have taught international students as well from all over the world. I have good knowledge of vedic maths which I always deliver to all my kids which make them smarter from others kids. All the students to whom I have taught are now the top performers in their class .My...', 'Chandigarh', '₹500–1,000/hour', '2.0 yr.', '3.0 yr.', 'Not present'])
    writer.writerow([None, 'Pratiksha', 'Hardworking', 'All Subjects (Assamese medium Primary level) All 5th class subjects', 'Dear studentsI am your teacher, like a friend, and I will always do my best for you. I will always solve your problems like a good teacher. I taught so many kids since 3 years and they always wanted me to teach. I felt my teaching quality when I was teaching a very small kid who was unable to study, but now he is the top student in his class....', 'Uttarakhand', '₹5,500–6,000/month', '0.0 yr.', '3.0 yr.', '5 km'])
    writer.writerow(['https://userphotos2.teacheron.com/1557999-19621.jpg', 'Vasa Kanaka Durga Devi', 'BA SPECIAL TELUGU AND MA TELUGU LITERATURE', 'Telugu academic', 'long bio here', 'Andhra Pradesh', '₹1,500 2,000/hour', '2.0 yr.', '20.0 yr.', 'Not present'])