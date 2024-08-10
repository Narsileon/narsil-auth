import { Form, FormProvider, FormRenderer, useForm } from "@narsil-forms/Components";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";

import {
	BackButton,
	Button,
	Section,
	SectionContent,
	SectionFooter,
	SectionHeader,
	SectionTitle,
} from "@narsil-ui/Components";

interface Props {
	form: FormType;
	token: string;
}

const Index = ({ form, token }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
		data: {
			token: token,
		},
	});

	return (
		<FormProvider {...reactForm}>
			<Form route={route("password.update")}>
				<Section>
					<SectionHeader>
						<SectionTitle>{form.title}</SectionTitle>
					</SectionHeader>
					<SectionContent>
						<FormRenderer nodes={form.nodes} />
					</SectionContent>
					<SectionFooter>
						<Button type='submit'>{trans("Confirm")}</Button>
						<BackButton href={route("login")} />
					</SectionFooter>
				</Section>
			</Form>
		</FormProvider>
	);
};

export default Index;
